<?php

namespace App\EventsListener;

use App\Handler\ExceptionMappingModel;
use App\Handler\ExceptionMappingResolver;
use App\Model\ErrorResponseModel;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\SerializerInterface;

class ExceptionListener
{
    public function __construct(private ExceptionMappingResolver $resolver,
                                private LoggerInterface $logger,
                                private SerializerInterface $serializer)
    {
    }

    public function __invoke(ExceptionEvent $event): void
    {
        $throwable = $event->getThrowable();

        $mapping = $this->resolver->resolve($throwable::class);

        if (null === $mapping)
        {
            $mapping = new ExceptionMappingModel(Response::HTTP_INTERNAL_SERVER_ERROR,true,false);
        }

        if ($mapping->getCode() >= Response::HTTP_INTERNAL_SERVER_ERROR || $mapping->isLoggable())
        {
            $this->logger->error($throwable->getMessage() ,[
                'trace' => $throwable->getTraceAsString(),
                'previous' => null !== $throwable->getPrevious() ? $throwable->getPrevious()->getMessage() : '',
            ]);
        }

        $message = $mapping->isHidden() ? Response::$statusTexts[$mapping->getCode()] : $throwable->getMessage();

        $data = $this->serializer->serialize(new ErrorResponseModel($message),JsonEncoder::FORMAT);

        $response = new JsonResponse($data,$mapping->getCode(),[],true);

        $event->setResponse($response);
    }


}