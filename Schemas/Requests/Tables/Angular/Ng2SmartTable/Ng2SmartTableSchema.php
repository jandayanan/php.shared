<?php


namespace Shared\Schemas\Requests\Tables\Angular\Ng2SmartTable;


use Shared\Schemas\Requests\Tables\Angular\AngularTablesRequestSchema;

class Ng2SmartTableSchema extends AngularTablesRequestSchema
{
    protected $schema = [
        '_limit' => 'pagination',
        '_page' => 'offset',
    ];

    public static function checkPayload($payload){
        $self = new self;
        return $self->transformSchema( $payload, $self->schema );
    }
}
