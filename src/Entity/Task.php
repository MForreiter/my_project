<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class Task
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $task;

    /**
     * @ORM\Column(type="date")
     */
    private $dueDate;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Task
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTask()
    {
        return $this->task;
    }

    /**
     * @param mixed $task
     * @return Task
     */
    public function setTask($task)
    {
        $this->task = $task;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDueDate()
    {
        return $this->dueDate;
    }

    /**
     * @param mixed $dueDate
     * @return Task
     */
    public function setDueDate($dueDate)
    {
        $this->dueDate = $dueDate;
        return $this;
    }


}