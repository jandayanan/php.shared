<?php

namespace Shared\BaseClasses;

use Shared\Traits\Response;

abstract class Helper
{
    use Response;

    protected function generateSignature( $targets, $values ){
        $hashable = "";
        foreach( $targets as $key ){
            if( isset( $values[ $key ] ) ){
                $hashable .= $values[ $key ];
            }
        }

        $signature = quick_hash( $hashable, 0, 0 );

        return $this->httpSuccessResponse([
            "message" => "Successfully generated signature",
            "data" => [
                "signature" => $signature
            ]
        ])->getState();
    }

    protected function hydrator( $data, $rules, $model ){
        if( !$model instanceof Model ){
            return $this->httpInternalServerResponse([
                'message' => _("Data model invalid for hydration."),
            ])->getState();
        }

        $values = Arr::dot( $data );

        foreach( $rules as $key => $value ){
            if( in_array( $key, $model->getFillable() ) ){
                switch( $value ){
                    case "@@timestamp":
                        $resolved = date(env("APP_FORMAT_DATETIME", "Y-m-d H:i:s") );
                        break;

                    default:
                        $resolved = $values[ $value ];
                        break;
                }


                $model->$key = $resolved;
            }
        }

        return $this->httpSuccessResponse([
            'message' => _("Successfully hydrated model with data"),
            'data' => [
                'model' => $model,
            ]
        ])->getState();
    }

    protected function validator( $data, $rules ){
        foreach( $rules['validations'] as $key => $options ){
            $target = explode("::", $key )[0];
            $state = explode("::", $key )[1];
            $error = false;

            switch( $state ){
                case "set":
                    if( !isset( $data[ $target ] ) ){
                        $error = true;
                    }
                    break;

                case "in":
                    if( isset( $rules[ $options['key'] ] ) ){
                        if( !in_array( $data[ $target ], $rules[ $options['key'] ] ) ){
                            $error = true;
                        }
                    }
                    break;
            }

            if( $error ){
                return $this->httpInternalServerResponse([
                    'message' => $options['message'],
                ])->getState();
            }
        }

        return $this->httpSuccessResponse([
            "message" => "All validations passed."
        ])->getState();
    }
}
