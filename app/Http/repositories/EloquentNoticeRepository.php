<?php

namespace App\Http\Repositories;

use App\Domain\Entities\Notice\NoticeEntity;
use App\Domain\Repositories\INoticeRepository;
use App\Models\Notice;

class EloquentNoticeRepository implements INoticeRepository {
    public function create(NoticeEntity $notice): void {
        $noticeModel = new Notice();
        $noticeModel->_id = $notice->getId();
        $noticeModel->title = $notice->getTitle();
        $noticeModel->pdf_name = $notice->getPdfName();
        $noticeModel->link = $notice->getLink();
        $noticeModel->save();
    }

    public function getAll(): array {
        $notices = Notice::all();

        return $notices->toArray();
    }

    public function remove(string $id): bool {
        $notice = Notice::find($id);

        if(!$notice){
            return false;
        }
        $notice->delete();

        return true;
    }
}