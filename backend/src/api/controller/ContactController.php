<?php

namespace App\api\controller;

use App\api\repository\ContactRepository;

class ContactController
{
    public function __construct(private ContactRepository $repository) {}

    public function processRequest(string $method)
    {
        if ($method === 'POST') {

            $data = (array) json_decode(file_get_contents("php://input"), true); // (array) to convert NULL into [] 

            $error = $this->dataValidate($data);
            if (! empty($error)) {
                $this->respondUnprocessableContent($error);
                return;
            }

            $id = $this->repository->create($data);

            $this->respondCreate($id);
        } else {
            $this->respondMethodNotAllowed('POST');
        }
    }

    private function respondMethodNotAllowed(string $allowed): void
    {
        http_response_code(405);
        header("Allow: {$allowed}");
    }

    public function respondUnprocessableContent($error)
    {
        http_response_code(422);
        echo json_encode(['message' => $error]);
    }

    public function respondCreate($id)
    {
        http_response_code(201);
        echo json_encode(['message' => "Contact {$id} was created"]);
    }

    private function dataValidate(array $data): array
    {
        $error = [];
        if (empty($data['name'])) $error['name'] = 'Please, enter your first name';
        if (empty($data['surname'])) $error['surname'] = 'Please, enter your first surname';
        if (empty($data['phone'])) $error['phone'] = 'Please, enter your phone';
        if (empty($data['email'])) $error['email'] = 'Please, enter your email';
        elseif (! filter_var($data['email'], FILTER_VALIDATE_EMAIL)) $error['email'] = 'Please, enter valid email';
        if (empty($data['department']) || ! filter_var($data['department'], FILTER_VALIDATE_INT) || ! in_array($data['department'], [1,2,3,4,5])) $error['department'] = 'Please, select a department';
        if (empty($data['privacy'])) $error['privacy'] = 'Please, agree to Terms and Conditions and Privacy Policy';

        return $error;
    }
}
