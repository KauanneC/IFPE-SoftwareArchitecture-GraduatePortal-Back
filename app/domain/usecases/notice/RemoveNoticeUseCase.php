<?php

namespace App\Domain\UseCases\Notice;
use App\Domain\Repositories\INoticeRepository;
use Exception;

class RemoveNoticeUseCase {
    public function __construct(private INoticeRepository $iNoticeRepository){}

    public function execute(string $id): void {
        $result = $this->iNoticeRepository->remove($id);

        if(!$result){
            throw new Exception('Erro ao remover edital');
        }
    }
}