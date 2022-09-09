<?php

namespace Shared\Traits;

trait Permissioned
{
    protected $permissioned = true;
    protected $permissions;

    public function setPermissions( $permissions=[] ){
        if( $permissions && $this->permissioned === true ) {
            $this->permissions = $permissions;
        }

        return $this;
    }

    public function can( $permission ) {
        if( $this->permissions && $this->permissioned === true ) {
            foreach ($this->permissions as $key => $value) {
                if ($permission == $key) {
                    return $this->permissions[$key];
                }
            }
        }

        return $this;
    }
}
