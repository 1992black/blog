<?php
    class KNN{
        public function show($ary) {
            for($j = 0; $j < count($ary); $j++) {
                echo $ary[$j].' ';
            }
            echo '<br>';
        }
        
        public function show2($ary) {
            for($i = 0; $i < count($ary); $i++) {
                for($j = 0; $j < count($ary[0]); $j++) {
                    echo $ary[$i][$j].' ';
                }
                echo '<br>';
            }
        }
        public function createDataSet() {
            $group = array(
                array(1.0, 1.1), 
                array(1.0, 1.0), 
                array(0, 0), 
                array(0, 0.1),
            );
            $labels = array("A", "A", "B", "B");
            return array('group'=> $group, 'labels'=> $labels);
        }
    
        public function img2vector($filename) {
            $returnVect = array();
            $fr = fopen($filename, 'r');
            $result = fread($fr, 1024 + 64);
            $s = '';
            for($i = 0; $i < 32; $i++) {
                for($j = 0; $j < 32; $j++) {
                    $s = $s. $result[34 * $i + $j];
                }
            }
            fclose($fr);
            return $s;
        }
        
        public function classify0($inX, $dataSet, $labels, $k) {
            $length = strlen($inX);
            $dataSetSize = count($dataSet);
            $diffMat = array(array());
            for($i = 0; $i < $dataSetSize; $i++) {
                $diffMat[$i] = $inX;
            }
            $sqDistances = array();
            for($i = 0; $i < $dataSetSize; $i++) {
                $add_ans = 0;
                for($j = 0; $j < $length; $j++) {
                    $sub_ans = ((int)(substr($diffMat[$i], $j, 1)) - (int)($dataSet[$i][$j]));
                    $mul_ans = $sub_ans * $sub_ans;
                    $add_ans += $mul_ans;
                }
                $sqDistances[$i] = $add_ans;
            }
            asort($sqDistances);
            //print_r($sqDistances);
            $classCount = array();
            
            $count = 0;
            foreach($sqDistances as $key=> $value) {
                $count++;
                if($count > $k) {
                    break;
                }
                $voteIlabel = $labels[$key];
                #echo $voteIlabel.'<br>';
                $classCount[$voteIlabel] = 0;
            }
            $count = 0;
            //echo '<br>keys:<br>';
            //print_r($labels);
            foreach($sqDistances as $key=> $value) {
                $count++;
                if($count > $k) {
                    break;
                }
                $voteIlabel = $labels[$key];
                if($voteIlabel == '') {
                    //echo '<br>'. $key. '<br>';
                }
                $classCount[$voteIlabel] = $classCount[$voteIlabel] + 1;
            }
            arsort($classCount);
            print_r($classCount);
            $ans = key($classCount);
            return $ans;
        }
        
        public function handwriteClassTest($root_path, $txt_name) {
            $hwLabels = array();
            //$trainingFileList = scandir('/data/home/bxu2359050697/htdocs/K-NN/trainingDigits/');
            //echo $root_path, $txt_name;
            $train_dir = $root_path. 'K-NN/trainingDigits/';
            //echo $train_dir;
            $trainingDirList = scandir($train_dir);
            #print_r($trainingDirList);
            $dir_length = count($trainingDirList);
            $trainingMat = array(array(1024));
            $train_count = 0;
            #echo 'length:'. $dir_length. '<br>';
            for($i = 0; $i < $dir_length; $i++) {
                $fileNameStr = $trainingDirList[$i];
                if($fileNameStr == '.' || $fileNameStr == '..') {
                    continue;
                }
                #echo 'scan:'. $train_dir. $trainingDirList[$i]. '/<br>';
                $trainingFileList = scandir($train_dir. $trainingDirList[$i]. '/');
                #print_r($trainingFileList);
                
                $m = count($trainingFileList);
                #echo 'length_file:'. $m. '<br>';
                $error_count = 0;
                for($j = 0; $j < $m; $j++) {
                    $real_num = $i - $error_count;
                    //echo $error_count.' '.$real_num;
                    $fileNameStr = $trainingFileList[$j];
                    if($fileNameStr == '.' || $fileNameStr == '..') {
                        $error_count += 1;
                        continue;
                    }
                    $classNumStr = $trainingDirList[$i];//(int)(substr($fileNameStr, 0, 1));
                    $hwLabels[$train_count] = $classNumStr;
                    #print_r($hwLabels);
                    //$trainingMat[$i] = $this->img2vector('/data/home/bxu2359050697/htdocs/K-NN/trainingDigits/'.$fileNameStr);
                    $trainingMat[$train_count] = $this->img2vector($train_dir. $trainingDirList[$i]. '/'. $fileNameStr);
                    $train_count++;
                }
            }
            $vectorUnderTest = $this->img2vector($txt_name);
            #echo $root_path. $txt_name;
            $classifierResult = $this->classify0($vectorUnderTest, $trainingMat, $hwLabels, 5);
            return $classifierResult;
        }
        
    }
?>