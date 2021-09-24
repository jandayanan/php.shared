<?php
/**
 * Created by PhpStorm.
 * User: jan
 * Date: 10/18/18
 * Time: 2:22 PM
 */

namespace Shared\Traits;

/**
 * Trait Response
 * @package Common\Traits
 *
 * @method $this asJson( boolean $flag=true ) Sets response flag as json, can be used along with other flags
 * @method $this asCode( boolean $flag=true ) Sets response flag as code
 * @method $this asMessage( boolean $flag=true ) Sets response flag as message
 * @method $this asDescription( boolean $flag=true ) Sets response flag as description
 * @method $this asData( boolean $flag=true ) Sets response flag as data
 * @method $this asValue( boolean $flag=true ) Sets response flag as first data key's value
 * @method $this asJsonv( boolean $flag=true ) Sets response flag as first data key's value decoded as JSON
 * @method $this asParameters( boolean $flag=true ) Sets response flag as parameters
 */
trait Response
{
    // region Flags
    protected $as_json = false;
    protected $as_code = false;
    protected $as_message = false;
    protected $as_description = false;
    protected $as_data = false;
    protected $as_value = false;
    protected $as_jsonv = false;
    protected $as_parameters = false;

    protected $include_response_time = false;
    // endregion Flags

    protected $code = 500,
        $message = "Unauthorized action",
        $description = "",
        $data = [],
        $parameters = [],
        $info = [];

    // region Get Properties
    /**
     * @return mixed
     */
    public function getCode()
    {
        if( $this->as_json ){
            return response()->json([
                "code" => $this->code
            ]);
        }

        return $this->code;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        if( $this->as_json ){
            return response()->json([
                "description" => $this->description
            ]);
        }

        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        if( $this->as_json ){
            return response()->json([
                "data" => $this->data
            ]);
        }

        return $this->data;
    }

    /**
     * @return mixed
     */
    public function getParameters()
    {
        if( $this->as_json ){
            return response()->json([
                "parameters" => $this->parameters
            ]);
        }

        return $this->parameters;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        if( $this->as_json ){
            return response()->json([
                "message" => $this->message
            ]);
        }

        return $this->message;
    }
    /**
     * @return mixed
     */
    public function getValue()
    {
        $data = $this->getData();
        return reset( $data );
    }
    // endregion Get Properties

    // region Set Properties

    /**
     * @param mixed $code
     * @return $this
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @param mixed $description
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @param mixed $data
     * @return $this
     */
    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }

    /**
     * @param mixed $parameters
     * @return $this
     */
    public function setParameters($parameters)
    {
        $this->parameters = $parameters;
        return $this;
    }

    public function clearParameters(){
        return $this->setParameters ([]);
    }

    /**
     * @param mixed $message
     * @return $this
     */
    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
    }

    public function addData($data = [])
    {
        if (!empty($data) && is_array($data)) {
            $this->data = array_merge($this->data, $data);
        }

        return $this;
    }

    // endregion Set Properties

    protected function buildMessage($options = [])
    {
        if (!empty($options)) {
            $this->setResponse($options);
        }

        if( $this->include_response_time === true ){
            $diff = microtime(true) - LARAVEL_START;

            $this->info['response_time'] = number_format ( $diff, 5) . "s";
        }

        return [
            "code" => $this->code,
            "message" => $this->message,
            "description" => $this->description,
            "data" => $this->data,
            "parameters" => $this->parameters,
            "info" => $this->info,
        ];
    }

    protected function reset(){
        $this->code = 500;
        $this->message = "Unauthorized action";
        $this->description = "";
        $this->data = [];
        $this->parameters = [];
        $info = [];

        return $this;
    }

    public function setResponse($options)
    {
        $options = (array) $options;

        $this->code = (isset($options['code']) ? $options['code'] : $this->code);
        $this->message = (isset($options['message']) ? $options['message'] : $this->message);
        $this->description = (isset($options['description']) ? $options['description'] : $this->description);
        $this->data = (isset($options['data']) ? $options['data'] : $this->data);
        $this->parameters = (isset($options['parameters']) ? $options['parameters'] : $this->parameters);
        $this->info = (isset($options['info']) ? $options['info'] : $this->info);

        return $this;
    }

    public function getResponse($options = [])
    {
        if ($this->as_json === true) {
            return response()->json($this->buildMessage());
        }

        return $this->buildMessage($options);
    }

    public function getState(){
        if( $this->as_code ){
            return $this->getCode();
        }
        if( $this->as_message ){
            return $this->getMessage();
        }
        if( $this->as_description ){
            return $this->getDescription();
        }
        if( $this->as_data ){
            return $this->getData();
        }
        if( $this->as_value ){
            $data = $this->getData();
            return reset( $data );
        }
        if( $this->as_jsonv ){
            $data = $this->getData();
            return (array) json_decode ( reset( $data ) );
        }
        if( $this->as_parameters ){
            return $this->getParameters();
        }

        return $this;
    }

    public function setFlag( $type, $flag ){
        $this->resetFlags();

        $var = "as_" . $type;
        $this->$var = (boolean) $flag;

        return $this;
    }

    public function resetFlags(){
        foreach( $this as $key => $value ){
            if( strpos( $key, "as_" ) !== false && $key !== "as_json"){
                $this->$key = false;
            }
        }

        return $this;
    }

    public function __call($name, $arguments) {
        switch( $name ){
            case "asJson":
            case "asCode":
            case "asMessage":
            case "asDescription":
            case "asData":
            case "asParameters":
            case "asValue":
            case "asJsonv":
                $type = strtolower( str_replace( "as", "", $name ) );
                $flag = ( empty( $arguments ) ? true : ( $arguments[0] === false ? false : true ) ) ;
                $this->setFlag( $type, $flag);

                return $this;
                break;
        }
    }

    //region Behavioral

    /**
     * @param Response $other
     * @return Response
     */
    public function absorb($other)
    {
        return $this->setResponse($other->getResponse());
    }

    public function isError()
    {
        return !$this->isSuccess();
    }

    public function isSuccess()
    {
        return ($this->code >= 200 && $this->code <= 299);
    }

    public function pluckData(){
        if( !empty( $this->getData() ) ){
            return $this->getData()[ array_key_first ( $this->getData() ) ];
        }

        return false;
    }
    //endregion Behavioral

    //region Success Response
    /**
     * @param array $options
     * @return $this
     */
    public function httpSuccessResponse($options = [])
    {
        $options = (array) $options;

        $options['code'] = 200;
        $options['message'] = (isset($options['message']) && \strlen($options['message']) > 0) ? $options['message'] : 'Request successfully executed.';

        return $this->setResponse($options);
    }
    //endregion Success Response

    //region Error Responses

    /**
     * Http 401 Error Response.
     *
     * @param array $options
     * @return mixed
     */
    public function httpUnauthorizedResponse($options = [])
    {
        $options = (array) $options;

        $options['code'] = 401;
        $options['message'] = (isset($options['message']) && \strlen($options['message']) > 0) ? $options['message'] : 'Unauthorized access.';

        return $this->setResponse($options);
    }

    /**
     * Http 403 Error Response.
     *
     * @param array $options
     * @return mixed
     */
    public function httpForbiddenResponse($options = [])
    {
        $options = (array) $options;

        $options['code'] = 403;
        $options['message'] = (isset($options['message']) && \strlen($options['message']) > 0) ? $options['message'] : 'Forbidden.';

        return $this->setResponse($options);
    }

    /**
     * Http 404 Error Response.
     *
     * @param array $options
     * @return $this
     */
    public function httpNotFoundResponse($options = [])
    {
        $options = (array) $options;

        $options['code'] = 404;
        $options['message'] = (isset($options['message']) && \strlen($options['message']) > 0) ? $options['message'] : 'No data found.';

        return $this->setResponse($options);
    }

    /**
     * Http 500 Error Response.
     *
     * @param array $options
     * @return $this
     */
    public function httpInternalServerResponse($options = [])
    {
        $options = (array) $options;

        $options['code'] = 500;
        $options['message'] = (isset($options['message']) && \strlen($options['message']) > 0) ? $options['message'] : 'Internal server error.';

        return $this->setResponse($options);
    }
    //endregion Error Responses

}
