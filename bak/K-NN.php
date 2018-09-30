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
            #print 'img2vector:'. $filename. '<br>';
            $returnVect = array();
            $fr = fopen($filename, 'r');
            $result = fread($fr, 1024 + 64);
            for($i = 0; $i < 32; $i++) {
                for($j = 0; $j < 32; $j++) {
                    $returnVect[32 * $i + $j] = $result[34 * $i + $j];
                }
            }
            fclose($fr);
            return $returnVect;
        }
        
        public function classify0($inX, $dataSet, $labels, $k) {
            echo 'classify0<br>';
            #print_r($dataSet);
            $length = count($inX);
            $dataSetSize = count($dataSet);
            $diffMat = array(array());
            for($i = 0; $i < $dataSetSize; $i++) {
                $diffMat[$i] = $inX;
            }
            #$this->show2($diffMat);
            for($i = 0; $i < $dataSetSize; $i++) {
                for($j = 0; $j < $length; $j++) {
                    $diffMat[$i][$j] -= $dataSet[$i][$j];
                }
            }
            #sqDiffMat = diffMat ** 2;
            for($i = 0; $i < $dataSetSize; $i++) {
                for($j = 0; $j < $length; $j++) {
                    $diffMat[$i][$j] *= $diffMat[$i][$j];
                }
            }
            #$this->show2($diffMat);
            $sqDistances = array(); #diffMat.sum(axis = 1);   #axis = 0为列求和, axis = 1为行求和
            for($i = 0; $i < $dataSetSize; $i++) {
                $sum = 0;
                $sqDistance = array();
                for($j = 0; $j < $length; $j++) {
                    $sum += $diffMat[$i][$j];
                }
                #print $sum.'<br>';
                $sqDistances[$i] = $sum;
                #print_r($sqDistances);
                #echo '<br>';
                #array_push($sqDistances, $sqDistance);
            }
            asort($sqDistances);
            #print_r($sqDistances);
            #$this->show($sqDistances);
            $classCount = array();
            foreach($sqDistances as $key=> $value) {
                $voteIlabel = $labels[$key];
                $classCount[$voteIlabel] = 0;
            }
            $count = 0;
            foreach($sqDistances as $key=> $value) {
                $count++;
                if($count > $k) {
                    break;
                }
                $voteIlabel = $labels[$key];
                $classCount[$voteIlabel] = $classCount[$voteIlabel] + 1;
            }
            #print_r($classCount);
            print_r($classCount);
            $ans = key($classCount);
            #print_r($ans);
            return $ans;
        }
        
        public function handwriteClassTest($txt_name) {
            $a = array('1_2.txt', '2_2.txt');
            print_r($a);
            $b = $a[0];
            #echo $b.'<br>';
            #print 'class';
            $hwLabels = array();
            $trainingFileList = scandir('/data/home/bxu2359050697/htdocs/trainingDigits/');
            $m = count($trainingFileList);
            $trainingMat = array(array(1024));
            for($i = 0; $i < $m; $i++) {
                $fileNameStr = $trainingFileList[$i];
                #echo 'fileNameStr:'. $fileNameStr. '<br>';
                $fileStr_tmp = split('.', $fileNameStr); #$fileNameStr.split('.')[0]
                $fileStr = $fileStr_tmp[0];
                $classNumStr_tmp = split('_', $fileStr); #int(fileStr.split('_')[0])
                $classNumStr = (int)($classNumStr_tmp[0]);
                #hwLabels.append(classNumStr)
                #array_push($hwlabels, $classNumStr);
                $hwLabels[$i] = $classNumStr;
                #print $fileNameStr4;
                $trainingMat[$i] = $this->img2vector('/data/home/bxu2359050697/htdocs/trainingDigits/'. $fileNameStr);
            }
            $vectorUnderTest = $this->img2vector($txt_name);
            $classifierResult = $this->classify0($vectorUnderTest, $trainingMat, $hwLabels, 3);
            print $classifierResult;
        }
    }
#Array ( [0] => Array ( [0] => 2.21 ) [1] => Array ( [1] => 2 ) [2] => Array ( [2] => 0 ) [3] => Array ( [3] => 0.01 ) ) 

?>