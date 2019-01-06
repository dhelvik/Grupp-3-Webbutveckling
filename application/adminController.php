<?php
include 'adminDAO.php';

class AdminController
{

    public function getKarnevalists($search)
    {
        try {
            $dao = new AdminDao();
            return $dao->getKarnevalists($search);
        } catch (PDOException $e) {
            throw $e;
        }
    }

    public function updateKarnevalist($firstName, $lastName, $mail, $sectionName, $phoneNumber)
    {
        try {
            $dao = new AdminDao();
            $dao->updateKarnevalist($firstName, $lastName, $mail, $sectionName, $phoneNumber);
        } catch (PDOException $e) {
            throw $e;
        }
    }

    public function deleteKarnevalist($mail)
    {
        try {
            $dao = new AdminDao();
            $dao->deleteKarnevalist($mail);
        } catch (PDOException $e) {
            throw $e;
        }
    }

    public function getAllQuestions()
    {
        try {
            $dao = new AdminDao();
            return $dao->getAllQuestions();
        } catch (PDOException $e) {
            throw $e;
        }
    }
    public function deleteQuestion($QID)
    {
        try {
            $dao = new AdminDao();
            return $dao->deleteQuestion($QID);
        } catch (PDOException $e) {
            throw $e;
        }
    }
    public function addEventInfoToDB($heading, $eventInfo, $imgName, $imgPath)
    {
        try {
            $dao = new AdminDao();
            $dao->addEventsInfoToDB($heading, $eventInfo, $imgName, $imgPath);
        } catch (PDOException $e) {
            throw $e;
        }
    }
}
?>