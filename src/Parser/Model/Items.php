<?php

namespace App\Parser\Model;

use Doctrine\Common\Collections\ArrayCollection;

class Items
{
    private int $id = 0;
    private int $started_at = 0;
    private string $location_title;
    private string $location_type;
    private int $updated_at = 0;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Items
     */
    public function setId(int $id): Items
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getStartedAt(): int
    {
        return $this->started_at;
    }

    /**
     * @param int $started_at
     * @return Items
     */
    public function setStartedAt(int $started_at): Items
    {
        $this->started_at = $started_at;
        return $this;
    }

    /**
     * @return string
     */
    public function getLocationTitle(): string
    {
        return $this->location_title;
    }

    /**
     * @param string $location_title
     * @return Items
     */
    public function setLocationTitle(string $location_title): Items
    {
        $this->location_title = $location_title;
        return $this;
    }

    /**
     * @return string
     */
    public function getLocationType(): string
    {
        return $this->location_type;
    }

    /**
     * @param string $location_type
     * @return Items
     */
    public function setLocationType(string $location_type): Items
    {
        $this->location_type = $location_type;
        return $this;
    }

    /**
     * @return int
     */
    public function getUpdatedAt(): int
    {
        return $this->updated_at;
    }

    /**
     * @param int $updated_at
     * @return Items
     */
    public function setUpdatedAt(int $updated_at): Items
    {
        $this->updated_at = $updated_at;
        return $this;
    }
}
