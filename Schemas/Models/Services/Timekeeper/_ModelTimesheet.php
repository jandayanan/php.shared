<?php
/**
 * Created by PhpStorm.
 * User: jan
 * Date: 9/28/21
 * Time: 1:10 AM
 */

namespace Shared\Schema\Models\Services\TimeKeeper;
/**
 * Interface _ModelTimesheet
 * @package Shared\Schema\Models\Services\TimeKeeper
 * @inheritdoc Shared\BaseClasses\Model
 *
 * @property $id
 * @property $tenant_id
 * @property $schedule_id
 * @property $entity_id
 * @property $entity_name
 * @property $year
 * @property $month
 * @property $period_start
 * @property $period_end
 * @property $scheduled_days
 * @property $scheduled_hours
 * @property $actual_days
 * @property $actual_hours
 * @property $remarks
 * @property $sheet_status
 * @property $prepared_by
 * @property $status
 * @property $created_by
 * @property $updated_by
 * @property $deleted_by
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @property _ModelTimesheetDetail[] $details
 */
interface _ModelTimesheet{

}
