<?php

namespace App\Filament\Resources\ForexTransactionResource\Pages;

use App\Filament\Resources\ForexTransactionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditForexTransaction extends EditRecord
{
    protected static string $resource = ForexTransactionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
