<?php

namespace App\Tables;

// use App\Models\Books;
use Illuminate\Http\Request;
use App\Models\Books as ModelsBooks;
use ProtoneMedia\Splade\SpladeTable;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\Facades\Toast;

class books extends AbstractTable
{
    /**
     * Create a new instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the user is authorized to perform bulk actions and exports.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {
        return true;
    }

    /**
     * The resource or query builder.
     *
     * @return mixed
     */
    public function for()
    {
        return ModelsBooks::query();
    }

    /**
     * Configure the given SpladeTable.
     *
     * @param \ProtoneMedia\Splade\SpladeTable $table
     * @return void
     */
    public function configure(SpladeTable $table)
    {
        $table
            ->withGlobalSearch( 'Search Using Title/ Author / Year',['title','Author','Year'])
            // ->rowLink(fn (ModelsBooks $book) => route('books.show', $book->id))
            ->defaultSort('title')
            ->column('id', sortable: true)
            ->column('title', sortable: true)
            ->column('Year', sortable: true ,label:'Published Year')
            ->column('Edition', sortable: true)
            ->column('Author', sortable: true)
            ->column('Actions')
            ->paginate(10)
            ->bulkAction(
                label: 'Delete Selected',
                confirm: true,
                confirmText: 'Are you sure you want Delete These boook?',
                confirmButton: 'Yes, Delete!',
                cancelButton: 'No, Cancel X',
                before: fn (array $selectedIds) =>  ModelsBooks::whereIn('id', $selectedIds)->delete(),                  
                after: fn () => Toast::info('Books Deleted'),
                
            );
         
            // ->export();
    }
}

