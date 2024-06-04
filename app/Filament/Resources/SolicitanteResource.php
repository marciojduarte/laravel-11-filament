<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SolicitanteResource\Pages;
use App\Filament\Resources\SolicitanteResource\RelationManagers;
use App\Models\Solicitante;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SolicitanteResource extends Resource
{
    protected static ?string $model = Solicitante::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Solicitantes';
    protected static ?string $pluralLabel = 'Solicitantes';
    protected static ?string $label = 'Solicitante';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nome')
                ->required()
                ->maxLength(100)
                ->label('Nome'),
            Forms\Components\TextInput::make('contato')
                ->maxLength(100)
                ->label('Contato'),
            Forms\Components\TextInput::make('matricula')
                ->maxLength(50)
                ->label('Matrícula'),
            Forms\Components\TextInput::make('telefone_comercial')
                ->maxLength(20)
                ->label('telefone Comercial')
                ->mask('(99)9999-9999')
                ->placeholder('(DD)000-00009'),
            Forms\Components\TextInput::make('telefone_celular')
                ->maxLength(20)
                ->label('Telefone Celular')
                ->mask('(99)99999-9999')
                ->placeholder('(DD)9000-00009'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nome')->label('Nome'),
                Tables\Columns\TextColumn::make('contato')->label('Contato'),
                Tables\Columns\TextColumn::make('matricula')->label('Matrícula'),
                Tables\Columns\TextColumn::make('telefone_comercial')->label('Telefone Comercial'),
                Tables\Columns\TextColumn::make('telefone_celular')->label('Telefone Celular'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListSolicitantes::route('/'),
            'create' => Pages\CreateSolicitante::route('/create'),
            'edit' => Pages\EditSolicitante::route('/{record}/edit'),
        ];
    }
}
