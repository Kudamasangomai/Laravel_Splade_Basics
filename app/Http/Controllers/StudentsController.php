<?php

namespace App\Http\Controllers;

use App\Http\Requests\studentformrequest;
use App\Models\Students;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\SpladeForm;
use ProtoneMedia\Splade\SpladeTable;
use ProtoneMedia\Splade\FormBuilder\Password;
use ProtoneMedia\Splade\FormBuilder\Input;
use ProtoneMedia\Splade\FormBuilder\Submit;


class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $students = Students::paginate(10);
        // return view('students.students',compact('students'));
        return view('students.students',[
            'students'=> SpladeTable::for(Students::class)
                        ->withGlobalSearch(columns: ['name', 'email','phone'])
                        ->perPageOptions(['5','15','30'])
                        ->column('name',searchable:true)
                        ->column('email')
                        ->column('phone',searchable:true)
                        ->column('age', sortable:true)
                        ->column('actions')
                        ->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $form = SpladeForm::make()
        // ->class('y-10')
        // ->method('POST')
        // ->action(route('students.store'))
        // ->fields([
        //     Input::make('name')->label('Name'),
        //     Input::make('email')->label('Email'),
        //     Input::make('phone')->label('Phone'),
        //     Input::make('age')->label('age'),
        //     Submit::make()->label('Create'),
        // ]);

    // return view('students.createstudents', [
    //     'form' => $form,
    // ]);

     return view('students.createstudents');
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(studentformrequest $request)
    {
       
      $student = Students::create($request->validated());
        Toast::title('Student Succefully Created!')
                ->success()
                ->center()
                ->backdrop()
                ->autoDismiss(2);
        return redirect()->route('students.show',$student->id);

       
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Students::find($id);
        return view('students.detailstudent' ,compact('student'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Students::find($id);
        return view('students.editstudents' ,compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
     

        $this->validate($request, [
            'name' => 'required',
            'age' => 'required|integer',
            'email' => 'required',
            'phone' => 'required',
         
         
        ]);
        
        $student  = Students::find($id);
        $student->name = $request->input('name');
        $student->age= $request->input('age');
        $student->email = $request->input('email');
        $student->phone = $request->input('phone');
        $student->save();
        Toast::title('Profile was updated!')
                ->success()
                ->center()
                ->backdrop()
                ->autoDismiss(2);
        return redirect()->route('students.show',$id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Students::find($id);
        $student->delete();
        Toast::title('Student Succefully Deleted')
        ->success()
        ->center()
        ->backdrop()
        ->autoDismiss(2);
        return redirect()->route('students.index');
    }
}
