<?php
    class changeImage {
        public function pic2txt($file_dir, $file_name, $num = 0) {
            #$this->change2gray($file_dir. '/'. $file_name, $file_dir. '/tmp_'. $file_name);
            #$imgs_ary = $this->splitImage($file_dir. '/tmp_'. $file_name);
            $out_path = $file_dir.'/';
            #echo (file_exists($file_dir. '\\'. $file_name) ? $file_dir. '\\'. $file_name. 'file exists' : $file_dir. '\\'. $file_name. 'file not exists'). '<br>';
            #$l = scandir($file_dir. '\\');
            #echo 'l<br>';
            #print_r($l);
            #echo 'l<br>';
            
            $imgs_ary = $this->splitImage($file_dir. '/'. $file_name, $out_path, $num);
            $length = count($imgs_ary);
            #echo 'length'. $length;
            $txt_ary = array();
            for($i = 0; $i < $length; $i++) {
                $this->resizeImage(32, 32, $imgs_ary[$i], $imgs_ary[$i]);
                $txt_path = $out_path.'/'. $file_name. '_ans_'. $i;
                #echo 'txt_path'. $txt_path;
                $this->img2txt($imgs_ary[$i], $txt_path);
                $txt_ary[$i] = $txt_path;
            }
            return $txt_ary;
        }
        
        private function getAvg($file_path, $no_zero = false) {
            $im = ImageCreateFromPng($file_path); 

            $imgw = imagesx($im);
            $imgh = imagesy($im);
            
            $sum = 0;
            $zero_count = 0;
            for ($i=0; $i<$imgw; $i++)
            {
                for ($j=0; $j<$imgh; $j++)
                {

                    // get the rgb value for current pixel

                    $rgb = ImageColorAt($im, $i, $j); 

                    $rr = ($rgb >> 16) & 0xFF;
                    $gg = ($rgb >> 8) & 0xFF;
                    $bb = $rgb & 0xFF;
                    $g = $rr * 0.299 + $gg * 0.587 + $bb * 0.114;
                    $sum += $g;
                    if($no_zero) {
                        $zero_count += ($rr == 0 and $gg == 0 and $bb == 0) ? 1 : 0;
                    }
                }
            }
            $avg = $sum / ($imgh * $imgw - $zero_count);
            return $avg;
        }
        
        private function splitImage($file_path, $out_path = 'uploads/', $out_name = '') {
            $im = ImageCreateFromPng($file_path); 

            $imgw = imagesx($im);
            $imgh = imagesy($im);
            
            
            $avg = $this->getAvg($file_path);
            #echo 'avg'. $avg. '<br>';
            $find_true = true;
            $start_point = 0;
            $end_point = 0;
            $count = 0;
            $return_ary = array();
            for ($i=2; $i<$imgw - 1; $i++)
            {
                
                $ary = array();
                for ($j=0; $j<$imgh; $j++)
                {
                    $rgb = ImageColorAt($im, $i, $j);
                    // get the rgb value for current pixel
                    $rr = ($rgb >> 16) & 0xFF;
                    $gg = ($rgb >> 8) & 0xFF;
                    $bb = $rgb & 0xFF;
                    $g = $g = $rr * 0.299 + $gg * 0.587 + $bb * 0.114;
                    #echo $g. ' ';//. $avg. '<br>';
                    if($g < $avg and $i != 0 and $i != $imgw - 1 and $j != 0 and $j != $imgh - 1) {
                        $g = 0;
                        #echo '0';
                    }
                    else {
                        $g = 255;
                        #echo '1';
                    }
                    $ary[$j] = $g;
                    //echo $g.' ';
                }
                #echo '<br>';
                $ans = $this->calLine($ary);
                if ($find_true and $ans) {
                    $find_true = false;
                    $start_point = $i;
                    #echo 'start point';
                }
                elseif (!$find_true and !$ans) {
                    $find_true = true;
                    $end_point = $i;
                    if($end_point - $start_point > 2) {
                        $out_file = $out_path .$out_name. '_'. $count. ".png";
                        $this->cutImage($start_point, 0, $end_point - $start_point, $imgh, $file_path, $out_file);
                        $return_ary[$count++] = $out_file;
                    }
                    #echo 'end point';
                }
            }
            return $return_ary;
        }
        
        private function getBigMore($im, $imgw, $avg) {
            $count = 0;
            $imgh = 32;
            $zero_count = 0;
            for ($i=0; $i<$imgh; $i++) {
                for ($j=0; $j<$imgw; $j++) {
                    $rgb = ImageColorAt($im, $j, $i); 
                    // extract each value for r, g, b
                    $rr = ($rgb >> 16) & 0xFF;
                    $gg = ($rgb >> 8) & 0xFF;
                    $bb = $rgb & 0xFF;
                    $g = $rr * 0.299 + $gg * 0.587 + $bb * 0.114;
                    #echo $g. ' ';
                    $zero_count += ($g == 0 ? 1 : 0);
                    $count += ($g > $avg ? 1 : 0);
                }
            }
            #echo $count. ' '. ($imgw * $imgh). '<br>';
            return ($count > ($imgw * $imgh - $zero_count) / 2 ? true : false);
        }

        private function img2txt($file_path, $to_path) {
            $im = ImageCreateFromPng($file_path); 

            $imgw = imagesx($im);
            $imgh = imagesy($im);
            $avg = $this->getAvg($file_path, true);
            $big_more = $this->getBigMore($im, $imgw, $avg);
            $fw = fopen($to_path, 'w');
            $find_true = true;
            $start_point = 0;
            $end_point = 0;
            $return_ary = array();
            #echo $imgh. ' '. $imgw. ' '. $avg. '<br>';
            for ($i=0; $i<$imgh; $i++) {
                $count = 0;
                $ary = array();
                for ($j=0; $j<$imgw; $j++) {
                    $rgb = ImageColorAt($im, $j, $i); 
                    // extract each value for r, g, b
                    $rr = ($rgb >> 16) & 0xFF;
                    $gg = ($rgb >> 8) & 0xFF;
                    $bb = $rgb & 0xFF;
                    $g = $rr * 0.299 + $gg * 0.587 + $bb * 0.114;
                    if(false) {
                        echo $g. ' ';
                    }
                    else {
                        if($g == 0) {
                            #echo '0';
                            fwrite($fw, 0);
                        }
                        else {
                            if($big_more) {
                                #echo $g > $avg ? '0' : '1';
                                fwrite($fw, $g > $avg ? '0' : '1');
                            }
                            else {
                                #echo $g > $avg ? '1' : '0';
                                fwrite($fw, $g > $avg ? '1' : '0');
                            }
                        }
                    }
                }
                #echo '<br>';
                fwrite($fw, "\r\n");
            }
            fclose($fw);
        }
        
        private function calLine($arry) {
            #print_r($arry);
            $length = count($arry);
            for($i = 3; $i < $length - 3; $i++) {
                if($arry[$i] == 255 and $arry[$i + 1] == 255) {
                    return true;
                }
            }
            return false;
        }
        
        private function cutImage($x, $y, $width, $height, $from_path, $to_path) {
            #echo '<br>'. $x. ' '. $y. ' '. $width. ' '. $height. ' '. $from_path. ' '. $to_path. '<br>';
            $im = imagecreatefrompng($from_path);
            //$size = min(imagesx($im), imagesy($im));
            //$tmp = ('x' => $x, 'y' => $y, 'width' => $width, 'height' => $height);
            $tmp['x'] = $x;
            $tmp['y'] = $y;
            $tmp['width'] = $width;
            $tmp['height'] = $height;
            $im2 = imagecrop($im, $tmp);
            if ($im2 !== FALSE) {
                imagepng($im2, $to_path);
                echo $to_path.'<br>';
            }
        }
        public function resizeImage($width, $height, $from_path, $to_path) {
            $size = getimagesize($from_path);
            
            $src = imagecreatefromstring(file_get_contents($from_path));
            $dst = imagecreatetruecolor($width,$height);
            imagecopyresampled($dst,$src,0,0,0,0,$width,$height,$size[0],$size[1]);
            imagedestroy($src);
            imagepng($dst,$to_path); // adjust format as needed
            /*echo 'dst<br>';
            for($i = 0; $i < 32; $i++) {
                for($j = 0; $j < 32; $j++) {
                    $rgb = ImageColorAt($dst, $j, $i); 
                    // extract each value for r, g, b
                    $rr = ($rgb >> 16) & 0xFF;
                    $gg = ($rgb >> 8) & 0xFF;
                    $bb = $rgb & 0xFF;
                    $g = $rr * 0.299 + $gg * 0.587 + $bb * 0.114;
                    echo $g. ' ';
                }
                echo '<br>';
            }*/
            imagedestroy($dst);
        }
    }
?>