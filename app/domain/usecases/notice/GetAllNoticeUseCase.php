<?php

namespace App\Domain\UseCases\Notice;
use App\Domain\Repositories\INoticeRepository;
use Exception;

class GetAllNoticeUseCase {
    public function __construct(private INoticeRepository $iNoticeRepository){}

    public function execute(): array {
        $notices = $this->iNoticeRepository->getAll();

        if(empty($notices)){
            throw new Exception('Nenhum edital encontrado');
        }

        return $notices;
    }
}