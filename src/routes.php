<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes

$app->get('/form', function (Request $request, Response $response, array $args) {
  $collection = $this->client->generadoc->form;
  $forms = $collection->find([]);
  return $response->withJson(json_encode(iterator_to_array($forms, true)), 200);
});

$app->post('/form', function ($request, $response, $args) {
  $input = $request->getParsedBody();

  $collection = $this->client->generadoc->form;
  $insertOneResult = $collection->insertOne($input);
  return $response->withJson($insertOneResult->getInsertedId(), 201);
});

$app->get('/form/{id}', function (Request $request, Response $response, array $args) {
  $formid = $args['id'];
  $collection = $this->client->generadoc->form;
  $form = $collection->findOne(['_id' => $formid]);
  return $response->withJson(json_encode(iterator_to_array($form, true)), 200);
});

$app->get('/input', function (Request $request, Response $response, array $args) {
  $collection = $this->client->generadoc->input;
  $inputlist = $collection->find();
  return $response->withJson(json_encode(iterator_to_array($inputlist, true)), 200);
});

$app->post('/input', function ($request, $response, $args) {
  $input = $request->getParsedBody();

  $collection = $this->client->generadoc->input;
  $insertOneResult = $collection->insertOne($input);
  return $response->withJson($insertOneResult->getInsertedId(), 201);
});

$app->get('/input/{id}', function (Request $request, Response $response, array $args) {
  $inputid = $args['id'];
  $collection = $this->client->generadoc->input;
  $input = $collection->findOne(['_id' => $inputid]);
  return $response->withJson(json_encode(iterator_to_array($input, true)), 200);
});

$app->post('/doc', function ($request, $response, $args) {
  $input = $request->getParsedBody();

  $collection = $this->client->generadoc->doc;
  $insertOneResult = $collection->insertOne($input);
  return $response->withJson($insertOneResult->getInsertedId(), 201);
});

$app->get('/template', function (Request $request, Response $response, array $args) {
  $collection = $this->client->generadoc->template;
  $templatelist = $collection->find();
  return $response->withJson(json_encode(iterator_to_array($templatelist, true)), 200);
});

$app->post('/template', function ($request, $response, $args) {
  $input = $request->getParsedBody();

  $collection = $this->client->generadoc->template;
  $insertOneResult = $collection->insertOne($input);
  return $response->withJson($insertOneResult->getInsertedId(), 201);
});

$app->get('/template/{id}', function (Request $request, Response $response, array $args) {
  $tempid = $args['id'];
  $template = $this->client->generadoc->template->find(['id' => $tempid]);
  echo $template[0];
  return $response->withJson(json_encode($template), 200);
});
