<?php

namespace App\Domain\UseCases\Notice;

use App\Domain\Dtos\CreateNoticeDTO;

use App\Domain\Entities\Notice\NoticeEntity;
use App\Domain\Repositories\INoticeRepository;

class CreateNoticeUserCase {
    public function __construct(private INoticeRepository $iNoticeRepository){}

    public function execute(CreateNoticeDTO $data): NoticeEntity {
        $notice = new NoticeEntity(
            $data->title,
            $data->pdfName,
            $data->link,
        );

        $this->iNoticeRepository->create($notice);

        return $notice;
    }
}