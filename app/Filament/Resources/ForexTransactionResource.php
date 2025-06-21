<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ForexTransactionResource\Pages;
use App\Models\ForexTransaction;
use Awcodes\TableRepeater\Components\TableRepeater;
use Awcodes\TableRepeater\Header;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ForexTransactionResource extends Resource
{
    protected static ?string $model = ForexTransaction::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('customer_name')
                    ->required(),
                // Repeater::make('details')
                TableRepeater::make('details')
                    ->headers([
                        Header::make('currency')->width('150px'),
                        Header::make('amount'),
                        Header::make('rate'),
                    ])
                    ->schema([
                        Forms\Components\TextInput::make('currency')
                            ->placeholder('USD, IDR, AUD...')
                            ->required(),
                        Forms\Components\TextInput::make('amount')
                            ->numeric()
                            ->required(),
                        Forms\Components\TextInput::make('rate')
                            ->numeric()
                            ->required(),
                    ])
                    ->addActionLabel('Add another')
                    ->deleteAction(
                        fn (Forms\Components\Actions\Action $action) => $action
                            // ->hidden(function (array $arguments, Repeater $component) {
                            ->hidden(function (array $arguments, TableRepeater $component) {
                                $items = $component->getState();
                                $activeItem = $items[$arguments['item']];

                                return $activeItem['currency'] === 'AUD';
                            })
                    )
                    ->columnSpan('full'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('customer_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListForexTransactions::route('/'),
            'create' => Pages\CreateForexTransaction::route('/create'),
            'edit' => Pages\EditForexTransaction::route('/{record}/edit'),
        ];
    }
}
