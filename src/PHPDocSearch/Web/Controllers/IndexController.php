<?php

namespace PHPDocSearch\Web\Controllers;

use PHPDocSearch\Web\ContentNegotiation\ContentTypeResolver,
    PHPDocSearch\Web\Request,
    PHPDocSearch\Web\ViewFetcher;

class IndexController
{
    private $viewFetcher;

    private $contentTypeResolver;

    private $request;

    public function __construct(ViewFetcher $viewFetcher, ContentTypeResolver $contentTypeResolver, Request $request)
    {
        $this->viewFetcher = $viewFetcher;
        $this->contentTypeResolver = $contentTypeResolver;
        $this->request = $request;
    }

    public function handleRequest()
    {
        $acceptTypes = $this->request->getHeader('Accept');
        $availableTypes = ['text/html'];
        $responseType = $this->contentTypeResolver->getResponseType($acceptTypes, $availableTypes);

        if ($responseType) {
            // do something here
        } else {
            $availableTypes = ['text/plain'];
            $responseType = $this->contentTypeResolver->getResponseType($acceptTypes, $availableTypes);

            $view = $this->viewFetcher->fetch('Error\NotAcceptable', $this->request, $responseType);
        }

        return $view;
    }
}
