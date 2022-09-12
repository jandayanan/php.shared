<?php

namespace Shared\Traits;

trait Permissioned
{
    protected $permissions;

    public function setPermissions( $permissions ){
        $this->permissions = $permissions;

        return $this;
    }

    public function can( $permission ) {
        foreach ( $this->permissions as $key => $value  ) {
            if ( $permission == $key ) {
                return $this->permissions[$key];
            }
        }
    }
}
