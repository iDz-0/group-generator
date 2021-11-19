<?php

    final class Group {

        public function getCsvAsArray($fileName) {
            if(file_exists($fileName)) {
                $handle = fopen($fileName, "r");

                $array = [];
                while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                    $array[] = str_replace(';', ' ', $data);
                }
                return $array;
            }
            
            return array();

        }

        public function getGroup() {

            $file = $this->getCsvAsArray("Liste_Eleves.csv");
        
            return $file;

        }

        public function generateGroups($n) {

            $students = $this->getCsvAsArray("Liste_Eleves.csv");
            $groups = [];

            $nbrStudentPerGroup = ($n ? $n : 4);
            $nbrGroups = ceil(count($students)/$nbrStudentPerGroup);

            for($i = 0; $i < $nbrGroups; ++$i) {
                array_push($groups, array());
            }

            shuffle($students);

            for($i = 0; $i < count($students); ++$i) {
                array_push($groups[$i%$nbrGroups], $students[$i]);
            }

            //$groups = array_chunk($students, $nbrStudentPerGroup); //Ne fonctionne pas quand il n'y a pas assez de monde pour remplir le dernier groupe

            return $groups;

        }

    }
