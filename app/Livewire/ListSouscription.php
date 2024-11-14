<?php

namespace App\Livewire;

use Livewire\Component;
use Filament\Tables\Table;
use Filament\Tables\Filters\Filter;
use Illuminate\Contracts\View\View;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Actions\ExportAction;
use Filament\Tables\Actions\ImportAction;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Exports\BonPeseeExporter;
use App\Models\Souscription;
use Filament\Tables\Actions\ExportBulkAction;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Actions\Exports\Enums\ExportFormat;
use Filament\Tables\Concerns\InteractsWithTable;

class ListSouscription extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(Souscription::query())
            // ->paginated(false)
            ->columns([
                TextColumn::make('nom_prenom_assure')
                    ->label('Identité')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('date_naissance_assure')
                    ->label('Date de naissance')
                    ->searchable(),

                TextColumn::make('adresse_assure')
                    ->label('Adresse')
                    ->searchable(),

                TextColumn::make('phone_assure')
                    ->label('Telephone')
                    ->searchable(),

                TextColumn::make('email_assure')
                    ->label('Email')
                    ->searchable(),

                TextColumn::make('passeport_assure')
                    ->label('Passeport')
                    ->searchable(),

                TextColumn::make('statut')
                    ->searchable(),

                TextColumn::make('created_at')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([])
            ->actions([
                // ...
            ])
            ->bulkActions([]);
    }

    public function render()
    {
        return view('livewire.list-souscription');
    }
}
