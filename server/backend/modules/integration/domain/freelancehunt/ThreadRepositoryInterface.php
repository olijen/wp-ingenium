<?php

namespace backend\modules\integration\domain\freelancehunt;

interface ThreadRepositoryInterface
{
    /**
     * @return Thread[]
     */
    public function fetchAll();

    /**
     * @return Thread
     */
    public function fetchById();

    /**
     * @return bool
     */
    public function create();
}