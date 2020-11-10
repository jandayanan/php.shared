<?php
/**
 * Created by PhpStorm.
 * User: jan
 * Date: 10/18/18
 * Time: 2:22 PM
 */

namespace Shared\Traits;

trait Response
{
    // region Flags
    protected $as_json = false;
    // endregion Flags

    protected $code = 500,
    $message = "Unauthorized action",
    $description = "",
    $data = [],
    $parameters = [];

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }

    public function addData($data = [])
    {
        if (!empty($data) && is_array($data)) {
            $this->data = array_merge($this->data, $data);
        }

        return $this;
    }

    /**
     * @return mixed
     */
    public function getParameters()
    {
        return $this->parameters;

    }

    /**
     * @param mixed $parameters
     */
    public function setParameters($parameters)
    {
        $this->parameters = $parameters;
        return $this;
    }

    protected function buildMessage($options = [])
    {
        if (!empty($options)) {
            $this->setResponse($options);
        }

        return [
            "code" => $this->code,
            "message" => $this->message,
            "description" => $this->description,
            "data" => $this->data,
            "parameters" => $this->parameters,
        ];
    }

    public function setResponse($options)
    {
        $options = (array) $options;

        $this->code = (isset($options['code']) ? $options['code'] : $this->code);
        $this->message = (isset($options['message']) ? $options['message'] : $this->message);
        $this->description = (isset($options['description']) ? $options['description'] : $this->description);
        $this->data = (isset($options['data']) ? $options['data'] : $this->data);
        $this->parameters = (isset($options['parameters']) ? $options['parameters'] : $this->parameters);

        return $this;
    }

    public function getResponse($options = [])
    {
        if ($this->as_json === true) {
            return response()->json($this->buildMessage());
        }

        return $this->buildMessage($options);
    }

    public function asJson($flag = true)
    {
        $this->as_json = $flag;

        return $this;
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
    //endregion Behavioral

    //region Success Response
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
     * @return void
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
     * @return void
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
     * @return void
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
     * @return void
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
