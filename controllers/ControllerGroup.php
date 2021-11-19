<?php

    final class ControllerGroup {

        public function defaultAction() {
            $modelGroup = new Group();

            View::display('/group/form', array());
            View::display('/group/view', array('listEleve' => $modelGroup->getGroup()));
        }

        public function formAction() {
            $modelGroup = new Group();

            View::display('/group/load', array());
        }

        public function globalAction() {
            if(isset($_FILES['listEleve'])) {
                $file = file_get_contents($_FILES["listEleve"]["tmp_name"]);
                file_put_contents(Constants::getDirRoot() . '/Liste_Eleves.csv', $file);
            }
            if(isset($_POST['nbrEtudiant'])) {
                header('Location: /Group/generate/'.$_POST['nbrEtudiant']);
            }
            else {
                header('Location: /Group/generate/');
            }
        }

        public function loadFileAction() {

            $file = file_get_contents($_FILES["listEleve"]["tmp_name"]);
            file_put_contents(Constants::getDirRoot() . '/Liste_Eleves.csv', $file);

            $modelGroup = new Group();
            header('Location: /Group/display');
        }

        public function displayAction() {
            $modelGroup = new Group();

            View::display('/group/view', array('listEleve' => $modelGroup->getGroup()));
        }

        public function generateAction($params) {
            $modelGroup = new Group();
            if(isset($_POST['nbrEtudiant'])) {
                header('Location: /Group/generate/'.$_POST['nbrEtudiant']);
            }
            $groups = $modelGroup->generateGroups(($params ? $params : 4));

            View::display('/group/generate', array());
            View::display('/group/groups', array('groups' => $groups));
        }
    }
