<?php

namespace App\Actions;

use Illuminate\Support\Facades\DB;


class ArrangePosition
{
    public static function run(int $id)
    {

        DB::update("
                with RankedProposasls as (
                select id, row_number()  over(order by hours asc) as p
                from proposals
                where project_id = :project
                )
                update proposals
                set position = (select p from RankedProposasls where proposals.id = RankedProposasls.id)
                where project_id = :project
                ", ['project' => $id]);
    }
}
