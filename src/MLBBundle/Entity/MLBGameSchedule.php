<?php

namespace MLBBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MLBGameSchedule
 *
 * @ORM\Table(name="m_l_b_game_schedule")
 * @ORM\Entity(repositoryClass="MLBBundle\Repository\MLBGameScheduleRepository")
 */
class MLBGameSchedule
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var datetime
     *
     * @ORM\Column(name="Day", type="date")
     */
    private $day;

    /**
     * @var string
     *
     * @ORM\Column(name="HomeTeam", type="string", length=50)
     */
    private $homeTeam;

    /**
     * @var string
     *
     * @ORM\Column(name="AwayTeam", type="string", length=50)
     */
    private $awayTeam;

    /**
     * @var int
     *
     * @ORM\Column(name="StadiumID", type="integer",length=32)
     */
    private $stadiumID;

    /**
     * @var int
     *
     * @ORM\Column(name="Year", type="integer",length=32)
     */

    private $year;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set day
     *
     * @param string $day
     * @return MLBGameSchedule
     */
    public function setDay($day)
    {
        $this->day = $day;

        return $this;
    }

    /**
     * Get day
     *
     * @return string 
     */
    public function getDay()
    {
        return $this->day;
    }

    /**
     * Set homeTeam
     *
     * @param string $homeTeam
     * @return MLBGameSchedule
     */
    public function setHomeTeam($homeTeam)
    {
        $this->homeTeam = $homeTeam;

        return $this;
    }

    /**
     * Get homeTeam
     *
     * @return string 
     */
    public function getHomeTeam()
    {
        return $this->homeTeam;
    }

    /**
     * Set awayTeam
     *
     * @param string $awayTeam
     * @return MLBGameSchedule
     */
    public function setAwayTeam($awayTeam)
    {
        $this->awayTeam = $awayTeam;

        return $this;
    }

    /**
     * Get awayTeam
     *
     * @return string 
     */
    public function getAwayTeam()
    {
        return $this->awayTeam;
    }

    /**
     * Set stadiumID
     *
     * @param integer $stadiumID
     * @return MLBGameSchedule
     */
    public function setStadiumID($stadiumID)
    {
        $this->stadiumID = $stadiumID;

        return $this;
    }

    /**
     * Get stadiumID
     *
     * @return integer 
     */
    public function getStadiumID()
    {
        return $this->stadiumID;
    }

    /**
     * Set year
     *
     * @param integer $year
     * @return MLBGameSchedule
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get year
     *
     * @return integer 
     */
    public function getYear()
    {
        return $this->year;
    }

}
