<?php

namespace WordnetBot\Http\Controllers;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Thrashzone13\WordnetWrapper\Entities\Word;
use Thrashzone13\WordnetWrapper\Wordnet;

class WordnetController extends Controller
{
    public function index(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $response->getBody()->write('Website under construction ...');
        return $response;
    }

    public function search(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $input = $request->getQueryParams()['word'] ?? null;

        if (empty($input)) {
            $response->getBody()->write('Enter a word!');
            return $response->withStatus(422);
        }

        /** @var Word $word */
        $word = Wordnet::create()->search($input);

        $response->getBody()->write($word->getTranslations()[0]->getTranslation());

        return $response;
    }
}