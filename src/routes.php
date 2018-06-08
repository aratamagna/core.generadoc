<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes

$app->get('/form', function (Request $request, Response $response, array $args) {
  $collection = $this->client->generadoc->form;
  $forms = $collection->find([]);
  return $response->withJson(json_encode(iterator_to_array($forms, false)), 200);
});

$app->get('/form/{id}', function (Request $request, Response $response, array $args) {
  $formid = $args['id'];
  $collection = $this->client->generadoc->form;
  $form = $collection->findOne(['_id' => $formid]);
  return $response->withJson(json_encode(iterator_to_array($form, false)), 200);
});

$app->post('/form', function ($request, $response, $args) {
  $input = $request->getParsedBody();

  $collection = $this->client->generadoc->form;
  $insertOneResult = $collection->insertOne($input);
  return $response->withJson($insertOneResult->getInsertedId(), 201);
});

$app->get('/form/input', function (Request $request, Response $response, array $args) {
  $collection = $this->client->generadoc->input;
  $inputlist = $collection->find();
  return $response->withJson(json_encode(iterator_to_array($inputlist, false)), 200);
});

$app->get('/form/input/{id}', function (Request $request, Response $response, array $args) {
  $inputid = $args['id'];
  $collection = $this->client->generadoc->input;
  $input = $collection->findOne(['_id' => $inputid]);
  return $response->withJson(json_encode(iterator_to_array($input, false)), 200);
});

$app->post('/form/input', function ($request, $response, $args) {
  $input = $request->getParsedBody();

  $collection = $this->client->generadoc->input;
  $insertOneResult = $collection->insertOne($input);
  return $response->withJson($insertOneResult->getInsertedId(), 201);
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
  return $response->withJson(json_encode(iterator_to_array($templatelist, false)), 200);
});

$app->get('/template/{id}', function (Request $request, Response $response, array $args) {
  $tempid = $args['id'];
  $collection = $this->client->generadoc->template;
  $template = $collection->findOne(['_id' => $tempid]);
  return $response->withJson(json_encode(iterator_to_array($template, false)), 200);
});

$app->post('/template', function ($request, $response, $args) {
  $input = $request->getParsedBody();

  $collection = $this->client->generadoc->template;
  $insertOneResult = $collection->insertOne($input);
  return $response->withJson($insertOneResult->getInsertedId(), 201);
});
