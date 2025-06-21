<?php

namespace App\Filament\Resources\ForexTransactionResource\Pages;

use App\Filament\Resources\ForexTransactionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListForexTransactions extends ListRecords
{
    protected static string $resource = ForexTransactionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
