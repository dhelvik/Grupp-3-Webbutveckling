<?php
include 'dataAccessLayer.php';

class Controller
{

    public function registerApplication($karnevalist, $section)
    {
        $dal = new DataAccessLayer();
        try {
            if (is_null($dal->getKarnevalist($karnevalist))) {
                $dal->setKarnevalist($karnevalist);
            }
            $dal->setKarnevalistSection($karnevalist, $section);
        } catch (PDOException $e) {
            throw $e;
        }
    }

    public function registerEntry($entry)
    {
        $dal = new DataAccessLayer();
        try {
            $dal->setEntry($entry);
        } catch (PDOException $e) {
            throw $e;
        }
    }

    public function getEntries()
    {
        $dal = new DataAccessLayer();
        $entries = $dal->getEntries();
        return $entries;
    }
    
    public function signIn($user)
    {
        $dal = new DataAccessLayer();
        try {
            return $dal->getUser($user);
        } catch (PDOException $e) {
            throw $e;
        }
    }


    public function getEventTypes()
    {
        try {
            $dal = new DataAccessLayer();
            $eventTypes = $dal->getEventTypes();
            return $eventTypes;
        } catch (PDOException $e) {
            throw $e;
        }
    }

    public function getEventsForType($eventName)
    {
        try {
            $dal = new DataAccessLayer();
            $events = $dal->getEventsForType($eventName);
            return $events;
        } catch (PDOException $e) {
            throw $e;
        }
    }

    public function getEventsForTypeDate($eventName, $eventDate)
    {
        try {
            $dal = new DataAccessLayer();
            $events = $dal->getEventsForTypeDate($eventName, $eventDate);
            return $events;
        } catch (PDOException $e) {
            throw $e;
        }
    }

    public function reserveTickets($customerName, $customerEmail, $customerPhoneNbr, $eventName, $eventDate, $eventTime, $ticketQuantity)
    {
        try {
            $dal = new DataAccessLayer();
            $dal->reserveTickets($customerName, $customerEmail, $customerPhoneNbr, $eventName, $eventDate, $eventTime, $ticketQuantity);
        } catch (PDOException $e) {
            throw $e;
        }
    }
    public function registerQuestion($name, $mail, $question){
        try {
            $dal = new DataAccessLayer();
            $dal->registerQuestion($name, $mail, $question);
        } catch (PDOException $e) {
            throw $e;
        }
    }
}
?>