<?php

namespace App\Http\Controllers;
use Auth;
use Excel;
use Artisan;
use App\App;
use App\Attendance;
use App\Classes;
use App\CATest;
use App\Comments;
use App\Day;
use App\Dormitory;
use App\Enquiry;
use App\Employee;
use App\EmployeeAttendance;
use App\Exam;
use App\Expense;
use App\ExpenseCategory;
use App\Invoice;
use App\Payment;
use App\PromotionHistory;
use App\Gallery;
use App\Grade;
use App\Library;
use App\Notice;
use App\Mark;
use App\Material;
use App\Message;
use App\Posts;
use App\Reg;
use App\Reply;
use App\Role;
use App\Routine;
use App\School;
use App\Sections;
use App\Settings;
use App\AcademicSession;
use App\Subject;
use App\TeacherAttendance;
use App\Term;
use App\Test;
use App\TestOption;
use App\TestQuestion;
use App\TestResult;
use App\Transport;
use App\User;
use App\Visitor;
use App\Http\Requests;
use Illuminate\Http\Request;
use Redirect;
use Mail;
use SMS;
use PDF;
use Input;
use Validator;
use Session;
use Illuminate\Support\Facades\DB;
use Charts;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
		$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Posts::orderBy('created_at','desc')->paginate(4);
    	$classes = Classes::orderBy('created_at','asc')->paginate(4);
        $materials = Material::count();
        $notices = Notice::orderBy('created_at','asc')->paginate(3);
    	$authe = Auth::user();
		$att = Attendance::all();
		
    	return view('home')->with(compact(['authe','posts','materials','notices','classes','att', 'chart']));
	}
	
    public function apps()
    {
		if(!Auth::user()->permission('is_admin'))
			return redirect('dashboard');
		$apps = App::all();
    	return view('admin.apps')->with(compact(['apps']));
	}
	public function add_app(Request $request)
	{
		if(!Auth::user()->permission('is_admin'))
			return redirect('dashboard');
		$app = new App();
		$app->name = $request->get('name');
		$app->app_token = $this->uniqueKey();
		$app->app_secret = $this->uniqueKey();
		$app->save();
		$success = "Data is added";
        return back()->with('success',$success);
	}
	public function update_app(Request $request)
    {
		 if(!Auth::user()->permission('is_admin'))
		 	return redirect('dashboard');
		$getapp = App::find($request->get('id'));
		if($getapp){
			$getapp->name = $request->get('name');
			$getapp->save();
		}
		$success = "Data is updated";
        return back()->with('success',$success);
	}
	public function destroy_app($id)
	{
		if(!Auth::user()->permission('is_admin'))
			return redirect('dashboard');
		$app = App::find($id);
		$app->delete();
		$success = "Data is deleted";
        return back()->with('success',$success);
	}
	public function uniqueKey($limit = 25) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randstring = '';
        for ($i = 0; $i < $limit; $i++) {
           $randstring .= $characters[rand(0, strlen($characters))];
        }
        return $randstring;
    }
    public function roles()
    {
		if(!Auth::user()->permission('is_admin'))
			return redirect('dashboard');
		$roles = Role::all();
		$columns = DB::getSchemaBuilder()->getColumnListing('roles');
		unset($columns[sizeof($columns)-1]);
		unset($columns[sizeof($columns)-1]);
		unset($columns[0]);
		unset($columns[1]);
    	return view('admin.roles')->with(compact(['roles', 'columns']));
	}
	public function add_role(Request $request)
	{
		if(!Auth::user()->permission('is_admin'))
			return redirect('dashboard');
		$role = new Role();
		$columns = DB::getSchemaBuilder()->getColumnListing('roles');
		unset($columns[sizeof($columns)-1]);
		unset($columns[sizeof($columns)-1]);
		unset($columns[0]);
		unset($columns[1]);
		foreach($columns as $key => $cols){
			$role->$cols = $request->get($cols) ? 1 : 0;
		}
		$role->name = strtolower($request->get('name'));
		$role->save();
		$success = "Data is added";
        return back()->with('success',$success);
	}
	public function update_role(Request $request)
    {
		if(!Auth::user()->permission('is_admin'))
			return redirect('dashboard');
		$roles = Role::find($request->get('id'));
		$roles->name = strtolower($request->get('name'));
		$roles->save();
		$success = "Data is updated";
        return back()->with('success',$success);
	}
	public function destroy_roles($id)
	{
		if(!Auth::user()->permission('is_admin'))
			return redirect('dashboard');
		$role = Role::find($id);
		$role->delete();
		$success = "Data is deleted";
        return back()->with('success',$success);
	}
    public function permission()
    {
		if(!Auth::user()->permission('is_admin'))
			return redirect('dashboard');
		$roles = Role::all();
		$columns = DB::getSchemaBuilder()->getColumnListing('roles');
		unset($columns[sizeof($columns)-1]);
		unset($columns[sizeof($columns)-1]);
		unset($columns[0]);
		unset($columns[1]);
    	return view('admin.permission')->with(compact(['roles', 'columns']));
	}
	public function update_permission(Request $request)
	{
		if(!Auth::user()->permission('is_admin'))
			return redirect('dashboard');
		$columns = DB::getSchemaBuilder()->getColumnListing('roles');
		unset($columns[sizeof($columns)-1]);
		unset($columns[sizeof($columns)-1]);
		unset($columns[0]);
		unset($columns[1]);
		$roles = Role::all();
		foreach($columns as $key => $cols){
			foreach( $roles as $key => $role ){
				$currRole = Role::find($role->id);
				$currRole->$cols = $request->get($cols)[$key];
				$currRole->save();
			}
		}
		$success = "Data is updated";
        return back()->with('success',$success);
	}
    //shows lists of teachers
    public function show_teacher()
	{	
		if(!Auth::user()->permission('view_teachers'))
			return redirect('dashboard');
		if(Auth::user()->admin_type == 'super'){
			$teachers = User::where('role', 'teacher')->get();
		}
		else{
			$teachers = User::where('role', 'teacher')->where('school_id', Auth::user()->school_id)->get();
		}
		return view('admin.teacher')->with(compact(['teachers']));
	}
	//shows lists of teachers
    public function show_employee()
	{	
		if(!Auth::user()->permission('view_employee'))
			return redirect('dashboard');
		$posts = Employee::all();
		$title = 'Employee';
		return view('admin.employee')->with(compact(['posts','title']));
	}

    public function visitors_log()
	{	
		if(!Auth::user()->permission('view_visitors_log'))
			return redirect('dashboard');
		$visitors = Visitor::all();
		return view('receptionist.visitors')->with(compact(['visitors']));
	}
	public function destroy_visitors_log($id)
	{
		if(!Auth::user()->permission('view_visitors_log'))
			return redirect('dashboard');
		$visitors = Visitor::find($id);
		$visitors->delete();
		
		$success = "Data is deleted";
        return back()->with('success',$success);
	}
	public function create_visitors_log(Request $request)
	{	
		if(!Auth::user()->permission('view_visitors_log'))
			return redirect('dashboard');
		$visitors = new Visitor();
		$visitors->purpose = $request->get('purpose');
		$visitors->details = $request->get('details');
		$visitors->check_in = $request->get('check_in');
		$visitors->check_out = $request->get('check_out');
		$visitors->counts = $request->get('counts');
		$visitors->whom_to_meet = $request->get('whom_to_meet');
		$visitors->save();
		
		$success = "Data is added";
        return back()->with('success',$success);
	}

	public function update_visitors_log(Request $request)
	{	
		if(!Auth::user()->permission('view_visitors_log'))
			return redirect('dashboard');
		$visitors = Visitor::find($request->get('id'));
		if($visitors){
			$visitors->purpose = $request->get('purpose');
			$visitors->details = $request->get('details');
			$visitors->check_in = $request->get('check_in');
			$visitors->check_out = $request->get('check_out');
			$visitors->counts = $request->get('counts');
			$visitors->whom_to_meet = $request->get('whom_to_meet');
			$visitors->save();
		}
		$success = "Data is updated";
        return back()->with('success',$success);
	}

	public function admission_enquiries()
	{	
		if(!Auth::user()->permission('view_visitors_log'))
			return redirect('dashboard');
		$enquiries = Enquiry::all();
		return view('receptionist.enquiry')->with(compact(['enquiries']));
	}
	public function destroy_admission_enquiries($id)
	{
		if(!Auth::user()->permission('view_visitors_log'))
			return redirect('dashboard');
		$visitors = Enquiry::find($id);
		if($visitors){
			$visitors->delete();
		}
		$success = "Data is deleted";
        return back()->with('success',$success);
	}
	public function create_admission_enquiries(Request $request)
	{	
		if(!Auth::user()->permission('view_visitors_log'))
			return redirect('dashboard');
		$visitors = new Enquiry();
		$visitors->name = $request->get('name');
		$visitors->discussion = $request->get('discussion');
		$visitors->email = $request->get('email');
		$visitors->phone = $request->get('phone');
		$visitors->address = $request->get('address');
		$visitors->status = $request->get('status');
		$visitors->save();
		$success = "Data is added";
        return back()->with('success',$success);
	}

	public function update_admission_enquiries(Request $request)
	{	
		if(!Auth::user()->permission('view_visitors_log'))
			return redirect('dashboard');
		$visitors = Enquiry::find($request->get('id'));
		if($visitors){
			$visitors->name = $request->get('name');
			$visitors->discussion = $request->get('discussion');
			$visitors->email = $request->get('email');
			$visitors->phone = $request->get('phone');
			$visitors->address = $request->get('address');
			$visitors->status = $request->get('status');
			$visitors->save();
		}
		$success = "Data is updated";
        return back()->with('success',$success);
	}


	public function terms()
	{	
		if(!Auth::user()->permission('is_admin'))
			return redirect('dashboard');
		$terms = Term::all();
		if($terms && $terms->count() > 0){
			foreach ($terms as $term) {
				$term->session = AcademicSession::find($term->session_id);
			}
		}
		return view('admin.terms.terms')->with(compact(['terms']));
	}
	public function add_term(Request $request)
	{	
		if(!Auth::user()->permission('is_admin'))
			return redirect('dashboard');
		$term = new Term();
		$term->name = $request->get('name');
		$term->session_id = $request->get('session');
		$term->save();
		$success = "Data is added";
        return back()->with('success',$success);
	}
	public function update_term(Request $request)
	{	
		if(!Auth::user()->permission('is_admin'))
			return redirect('dashboard');
		$term = Term::find($request->get('id'));
		if($term){
			$term->name = $request->get('name');
			$term->session_id = $request->get('session');
			$term->save();
		}
		
		$success = "Data is updated";
        return back()->with('success',$success);
	}
	public function destroy_term($id)
	{
		if(!Auth::user()->permission('is_admin'))
			return redirect('dashboard');
		$term = Term::find($id);
		$term->delete();
		$success = "Data is deleted";
        return back()->with('success',$success);
	}

	public function sessions()
	{	
		if(!Auth::user()->permission('is_admin'))
			return redirect('dashboard');
		$sessions = AcademicSession::all();
		return view('admin.sessions.sessions')->with(compact(['sessions']));
	}
	public function add_session(Request $request)
	{	
		if(!Auth::user()->permission('is_admin'))
			return redirect('dashboard');
		$sessions = new AcademicSession();
		$sessions->name = $request->get('name');
		$sessions->start = $request->get('start');
		$sessions->end = $request->get('end');
		$sessions->note = $request->get('note');
		$sessions->current = $request->get('current') ? 1 : 0;
		$sessions->save();
		$success = "Data is added";
        return back()->with('success',$success);
	}
	public function update_session(Request $request)
	{	
		if(!Auth::user()->permission('is_admin'))
			return redirect('dashboard');
		$sessions = AcademicSession::find($request->get('id'));
		if($sessions){
			if($request->get('current') && $request->get('current') == 1){
				foreach(AcademicSession::all() as $eachSession){
					$thisSession = AcademicSession::find($eachSession->id);
					$thisSession->current = 0;
					$thisSession->save();
				}
			}
			$sessions->name = $request->get('name');
			$sessions->start = $request->get('start');
			$sessions->end = $request->get('end');
			$sessions->note = $request->get('note');
			$sessions->current = $request->get('current') ? 1 : 0;
			$sessions->save();
		}
		$success = "Data is updated";
        return back()->with('success',$success);
	}
	public function destroy_session($id)
	{
		if(!Auth::user()->permission('is_admin'))
			return redirect('dashboard');
		$sessions = AcademicSession::find($id);
		$sessions->delete();
		
		$success = "Data is deleted";
        return back()->with('success',$success);
	}

	public function student_promotion($current_class='',$next_class='',$promote_from='',$promote_to='')
	{
		if(!Auth::user()->permission('is_admin') && !Auth::user()->permission('is_teacher'))
			return redirect('dashboard');
		$current_class = $current_class;
		$next_class = $next_class;
		$promote_from = $promote_from;
		$promote_to = $promote_to;
		$students = User::where('role', 'student')->where('class_id', $current_class)->orderBy('created_at','desc')->paginate();
		return view('admin.class.studentpromotion')->with(compact(['current_class','next_class','promote_from','promote_to','students']));
	}
	public function select_student_promotion(Request $request)
	{	
		if(!Auth::user()->permission('is_admin') && !Auth::user()->permission('is_teacher'))
			return redirect('dashboard');
		$current_class = $request->get('current_class');
		$next_class = $request->get('next_class');
		$promote_from = $request->get('promote_from');
		$promote_to = $request->get('promote_to');
		$students = User::where('role', 'student')->where('class_id', $current_class)->get();
		if($promote_to){
			return redirect('student-promotion/'.$current_class.'/'.$next_class.'/'.$promote_from.'/'.$promote_to);
		}
		else {
		 	return back();
		}
	}
	public function store_student_promotion(Request $request)
	{
		if(!Auth::user()->permission('is_admin') && !Auth::user()->permission('is_teacher'))
			return redirect('dashboard');
		$thisStudent = null;
		foreach($request->get('student_id') as $key => $student){
			$thisStudent = User::find($student);
			$thisStudent->class_id = $request->get('newclass')[$key];
			$thisStudent->save();
			$history = new PromotionHistory();
			$history->student_id = $student;
			$history->from_class = $request->get('current_class');
			$history->to_class = $request->get('newclass')[$key];
			$history->save();
		}
		return back();
		$success = "Promotion successful";
        return back()->with('success',$success);
	}

	//shows lists of parents
	public function show_parent()
	{	
		if(Auth::user()->role != 'teacher' && Auth::user()->role != 'admin')
			return redirect('dashboard');
		if(Auth::user()->admin_type == 'super'){
			$parents = User::where('role', 'parent')->get();
		}
		else{
			$parents = User::where('role', 'parent')->where('school_id', Auth::user()->school_id)->get();
		}
		return view('admin.parent')->with(compact(['parents']));
	}
	//shows lists of students
	public function show_student()
	{	
		if(!Auth::user()->permission('view_students'))
			return redirect('dashboard');
		$students = Auth::user()->admin_type == 'super' ? User::where('role', 'student')->get() : User::where('role', 'student')->where('school_id', Auth::user()->school_id)->get();
		return view('admin.students.student')->with(compact(['students']));
	}
	
	public function show_user_byid($id)
	{	
		$user = User::find($id);
		if($user){
			return view('admin.single-profile')->with(compact(['user']));
		}
		else{
			return redirect('dashboard');
		}
	}
	//shows spread sheets
	public function spread_sheets()
	{
		if(Auth::user()->role != 'teacher' && Auth::user()->role != 'admin')
			return redirect('dashboard');
		$classes = Classes::get_classes();
		$teacherlist = Auth::user()->admin_type == 'super' ? User::where('role', 'teacher')->orderBy('created_at','desc')->get() : User::where('role', 'teacher')->orderBy('created_at','desc')->where('school_id', Auth::user()->school_id)->get();
		return view('admin.class.spreadsheet')->with(compact(['classes','teacherlist']));
	}

	public function view_spread_sheets(Request $request)
	{
		if(Auth::user()->role != 'teacher' && Auth::user()->role != 'admin')
			return redirect('dashboard');
		
		$students = User::where('role', 'student')->where('class_id', $request->get('class_id'))->get();
		if($students && $students->count() > 0){
			$subject = Subject::find($request->get('subject_id'));
			$term = Term::find($request->get('term_id'));
			$class = Classes::find($request->get('class_id'));
			$ca_test = CATest::where('term_id', $request->get('term_id'))->where('subject_id', $request->get('subject_id'))->orderBy('first_a', 'DESC')->get();
			if($subject && $term && $class){
				foreach($students as $student){
					$student->mark = Mark::where('student_id', $student->id)->where('subject_id', $request->get('subject_id'))->where('term_id', $request->get('term_id'))->first();
				}
				$teacher = User::find($class->teacher_id);
				$marks = Mark::where('subject_id', $request->get('subject_id'))->where('term_id', $request->get('term_id'))->orderBy('mark_obtained', 'DESC')->get();
				$get_school_admin = School::find(Auth::user()->school_id);
				if(!$request->get('excel')){
					$pdf = PDF::loadView('prints.spreadsheet', compact('get_school_admin','students', 'term', 'subject', 'ca_test', 'class', 'teacher'));
					return $pdf->stream('spreadsheet.pdf');
				}
				else{
					$data = array(
						array('Class: ', $class ? $class->title : "-"),
						array('Subject: ', $subject ? $subject->title : "-"),
						array('Term: ', $term ? $term->name : "-"),
						array('Session: ', $term && $term->academic_session ? $term->academic_session->name : '-'),
						array('','','','', 'CAT 1', '','SUM 1', '', "CAT 2", 'SUM 2', 'EXAM', '', 'TTL',''),
						array('S/N', 'ADM', 'SEX', 'NAME', 20, 20, 'Pos', 'Grd', 20, 20, 60, 100, 'Position', 'Grade'),
					);
					$positionExam = array();
                    foreach ($students as $key => $student) {
                        $first = $ca_test->where('student_id',$student->id)->first() && $ca_test->where('student_id',$student->id)->first()->first ? $ca_test->where('student_id',$student->id)->first()->first: 0;
                        $second = $ca_test->where('student_id',$student->id)->first() && $ca_test->where('student_id',$student->id)->first()->second ? $ca_test->where('student_id',$student->id)->first()->second: 0;
                        $exam = $student->mark ? $student->mark->mark_obtained : 0;
                        $allSum = $first+$second+$exam;
                        $positionExam[] = $allSum . '+'. $student->id;
                    }
                    rsort($positionExam);
                    $positionExam2 = array();
                    foreach ($positionExam as $key => $value) {
                        $newExp = explode('+', $value);
                        $positionExam2[] = $newExp[0] . '+' . $key . '+' . $newExp[1];
                    }

                    $firstTest = array();
                    foreach ($students as $key => $value) {
                        $first1 = $ca_test->where('student_id',$value->id)->first() && $ca_test->where('student_id',$value->id)->first()->first ? $ca_test->where('student_id',$value->id)->first()->first: 0;
                        $firstTest[] = $first1 . '+'. $value->id;
                    }
                    rsort($firstTest);
                    $firstTest2 = array();
                    foreach ($firstTest as $key => $value) {
                        $newExp = explode('+', $value);
                        $firstTest2[] = $newExp[0] . '+' . $key . '+' . $newExp[1];
                    }
					foreach($students as $key => $student){
						$first = $ca_test->where('student_id',$student->id)->first() && $ca_test->where('student_id',$student->id)->first()->first ? $ca_test->where('student_id',$student->id)->first()->first: 0;
						$second = $ca_test->where('student_id',$student->id)->first() && $ca_test->where('student_id',$student->id)->first()->second ? $ca_test->where('student_id',$student->id)->first()->second: 0;
						$exam = $student->mark ? $student->mark->mark_obtained : 0;
						$allSum = $first+$second+$exam;
						$testPos = 0;
						$examPos = 0;
						foreach ($firstTest2 as $value) {
							$exp = explode('+',$value);
							if($exp[0] == $first && $exp[2] == $student->id){
								$testPos = $exp[1]+1;
							}
						}
						foreach ($positionExam2 as $value) {
							$exp = explode('+',$value);
							if($exp[0] == $allSum && $exp[2] == $student->id){
								$examPos = $exp[1]+1;
							}
						}
						$newArr = array(array(
							$key+1, 
							$student->reg_no, 
							$student->gender ? $student->gender : '-', 
							$student->name, 
							$ca_test->where('student_id',$student->id)->first() && $ca_test->where('student_id',$student->id)->first()->first ? $ca_test->where('student_id',$student->id)->first()->first: '-', 
							$ca_test->where('student_id',$student->id)->first() && $ca_test->where('student_id',$student->id)->first()->first ? $ca_test->where('student_id',$student->id)->first()->first: '-', 
							$testPos. Mark::positionLetter2($testPos), 
							$ca_test->where('student_id',$student->id)->first() && $ca_test->where('student_id',$student->id)->first()->first ? Mark::checkgradeSpreadsheetTest($ca_test->where('student_id',$student->id)->first()->first): '-', 
							$ca_test->where('student_id',$student->id)->first() && $ca_test->where('student_id',$student->id)->first()->second ? $ca_test->where('student_id',$student->id)->first()->second: '-', 
							$ca_test->where('student_id',$student->id)->first() && $ca_test->where('student_id',$student->id)->first()->second ? $ca_test->where('student_id',$student->id)->first()->second: '-', 
							$student->mark ? $student->mark->mark_obtained : '-', 
							$allSum, 
							$examPos. Mark::positionLetter2($examPos), 
							Mark::checkgradeSpreadsheet($allSum)
						));
						$data = array_merge($data,$newArr);
					}
					return Excel::create('spreadsheet', function($excel) use ($data) {
						$excel->sheet('mySheet', function($sheet) use ($data)
						{
							$sheet->fromArray($data, null, 'A1', false, false);
						});
					})->download('xlsx');
				}

			}
			else{
				$message =  'all fields are required';
					return back()->withMessage($message);
			}
		}
		else{
			$message =  'no student is found in selected class';
			return back()->withMessage($message);
		}
		
	}

	//shows lists of classes
	public function show_class()
	{
		if(Auth::user()->role != 'teacher' && Auth::user()->role != 'admin')
			return redirect('dashboard');
		if(Auth::user()->admin_type == 'super'){
			$classes = Classes::get_classes();
		}
		else{
			$classes = Classes::where('school_id', Auth::user()->school_id)->get();
		}
		$teacherlist = Auth::user()->admin_type == 'super' ? User::where('role', 'teacher')->orderBy('created_at','desc')->get() : User::where('role', 'teacher')->orderBy('created_at','desc')->where('school_id', Auth::user()->school_id)->get();
		return view('admin.class.list')->with(compact(['classes','teacherlist']));
	}

	//shows lists of created sections
	public function show_section()
	{
		if(!Auth::user()->permission('view_sections'))
			return redirect('dashboard');
		$classes = Classes::get_classes();
		$sections = Sections::orderBy('created_at','asc')->paginate();
		$teacher = User::where('role','teacher')->orderBy('created_at','asc')->paginate();
		return view('admin.class.section')->with(compact(['classes','teacher','sections']));
	}
	//view selected section
	public function view_section($id)
	{	
		if(!Auth::user()->permission('view_sections'))
			return redirect('dashboard');
		$classes = Classes::get_classes();
		$sections = Sections::orderBy('created_at','asc')->where('class_id',$id)->paginate();
		$teacher = User::where('role','teacher')->orderBy('created_at','asc')->paginate();
		$sect = Sections::where('id',$id)->find($id);
		$id = $id;
		return view('admin.class.section2')->with(compact(['teacher','sections','replies','sect','classes','id']));
	}
	//store new sections
	public function store_section(Request $request)
	{
		if(!Auth::user()->permission('add_section'))
			return redirect('dashboard');
		$validator = Validator::make($request->all(), [
       		'title' => 'required|unique:sections|max:255',
            'title' => array('Regex:/^[A-Za-z0-9 ]+$/'),
            'teacher_id' => 'required',
            'teacher_id' => array('Regex:/^[0-9 ]+$/'),
            'class_id' => 'required',
            'class_id' => array('Regex:/^[0-9 ]+$/'),
   		]);
   		if ($validator->fails()) {
   			return back();
   		}
		$sections = new Sections();
		$sections->title = $request->get('title');
		$sections->teacher_id = $request->get('teacher_id');
		$sections->class_id = $request->get('class_id');
		$sections->save();
		return back();

		$success = "Section is added";
        return back()->with('success',$success);
	}
	//update already created section
	public function update_section(Request $request)
	{
		$validator = Validator::make($request->all(), [
       		'title' => 'required|unique:sections|max:255',
            'title' => array('Regex:/^[A-Za-z0-9 ]+$/'),
            'teacher_id' => 'required',
            'teacher_id' => array('Regex:/^[0-9 ]+$/'),
            'class_id' => 'required',
            'class_id' => array('Regex:/^[0-9 ]+$/'),
   		]);
   		if ($validator->fails()) {
   			return back();
   		}
        $section = Sections::find($request->get('id'));
		$section->title = $request->get('title');
		$section->teacher_id = $request->get('teacher_id');
		$section->class_id = $request->get('class_id');
        $message =  trans('topbar_menu_lang.success');
       	$section->save();
        return back()->withMessage($message);
		$success = "Section is updated";
        return back()->with('success',$success);
    }
    //deletes section from the list
	public function destroy_section(Request $request, $id)
	{
		if(!Auth::user()->permission('add_section'))
			return redirect('dashboard');
		$post = Sections::find($id);
		$post->delete();
		
		$success = "Data is deleted";
        return back()->with('success',$success);
	}
	// shows the list of dormitories
	public function show_dormitory()
	{	
		$dormitories = Dormitory::orderBy('created_at','desc')->get();
		return view('admin.dormitory.list')->with(compact(['dormitories']));
	}
	//deletes already created dormitory
	public function destroy_dormitory(Request $request, $id)
	{
		if(!Auth::user()->permission('add_hostel'))
			return redirect('dashboard');
		$post = Dormitory::find($id);
		$post->delete();
		$success = "Data is deleted";
        return redirect('dormitory/dormitory_list')->with('success',$success);
	}
	//stores new dormitory
	public function store_dormitory(Request $request)
	{
		if(!Auth::user()->permission('add_hostel'))
			return redirect('dashboard');
		$validator = Validator::make($request->all(), [
       		'name' => 'required|unique:dormitories|max:255',
            'name' => array('Regex:/^[A-Za-z0-9 ]+$/'),
            'description' => array('Regex:/^[A-Za-z0-9 ]+$/'),
            'room_number' => 'required',
            'room_number' => array('Regex:/^[0-9 ]+$/'),
   		]);
   		if ($validator->fails()) {
   			return back();
   		}
		$dormitory = new Dormitory();
		$dormitory->room_number = $request->get('room_no');
		$dormitory->name = $request->get('name');
		$dormitory->description = $request->get('desc');
		$dormitory->active = "1";
		$dormitory->save();
		$success = "Data is added";
        return back()->with('success',$success);
	}
	
	//edit already created dormitory
	public function edit_dormitory(Request $request, $id) 
    {
		if(!Auth::user()->permission('add_hostel'))
			return redirect('dashboard');
        $dorm = Dormitory::where('id',$id)->first();
        return view('admin.dormitory.edit')->with(compact(['dorm']));

    }
    //updates already created dormitory
    public function update_dormitory(Request $request)
	{
		if(!Auth::user()->permission('add_hostel'))
			return redirect('dashboard');
		$validator = Validator::make($request->all(), [
            'name' => array('Regex:/^[A-Za-z0-9 ]+$/'),
            'description' => array('Regex:/^[A-Za-z0-9 ]+$/'),
            'room_number' => 'required',
            'room_number' => array('Regex:/^[0-9 ]+$/'),
   		]);
   		if ($validator->fails()) {
   			return back();
   		}
        $dormitory = Dormitory::find($request->get('id'));
		$dormitory->room_number = $request->get('room_no');
		$dormitory->name = $request->get('name');
		$dormitory->description = $request->get('desc');
        $dormitory->save();
		$success = "Data is updated";
        return back()->with('success',$success);
        
    }
	// shows the list of dormitories
	public function show_schools()
	{	
		if(!Auth::user()->permission('view_schools'))
			return redirect('dashboard');
		$schools = School::orderBy('created_at','desc')->get();
		return view('admin.schools.list')->with(compact(['schools']));
	}
	public function store_school(Request $request)
	{
		$school = new School();
		$school->name = $request->get('name');
		$school->email = $request->get('email');
		$school->phone = $request->get('phone');
		$school->address = $request->get('address');
		$school->color = $request->get('color');
        $file = $request->file('file');
        if($file){
			$extensions = ["jpg" , "jpeg", "png"];
			$isImage = $file->getClientOriginalExtension(); 
			if (in_array($isImage, $extensions)){
				$destinationPath = public_path().'/ev-assets/uploads/school-images';
				$extension = $file->getClientOriginalExtension(); // getting image extension
				$fileName = rand(11111,99999).'.'.$extension; // renameing image
				$request->file('file')->move($destinationPath, $fileName);
				$school->photo = $fileName; // upload path

			}
        }
        $stamp = $request->file('stamp');
        if($stamp){
			$extensions = ["jpg" , "jpeg", "png"];
			$isImage = $stamp->getClientOriginalExtension(); 
			if (in_array($isImage, $extensions)){
				$destinationPath = public_path().'/ev-assets/uploads/school-images';
				$extension = $stamp->getClientOriginalExtension(); // getting image extension
				$fileName = rand(11111,99999).'.'.$extension; // renameing image
				$request->file('stamp')->move($destinationPath, $fileName);
				$school->stamp = $fileName; // upload path

			}
        }
		$school->save();
        
		$success = "Data is added";
        return back()->with('success',$success);
	}
    public function update_school(Request $request)
	{
		if(!Auth::user()->permission('add_school'))
			return redirect('dashboard');
		$validator = Validator::make($request->all(), [
            'name' => array('Regex:/^[A-Za-z0-9 ]+$/'),
   		]);
   		if ($validator->fails()) {
   			return back();
   		}
        $school = School::find($request->get('id'));
		$school->name = $request->get('name');
		$school->email = $request->get('email');
		$school->phone = $request->get('phone');
		$school->address = $request->get('address');
		$school->color = $request->get('color');
		$school->status = $request->get('status');
        $file = $request->file('file');
        if($file){
			$extensions = ["jpg" , "jpeg", "png"];
			$isImage = $file->getClientOriginalExtension(); 
			if (in_array($isImage, $extensions)){
				$destinationPath = public_path().'/ev-assets/uploads/school-images';
				$extension = $file->getClientOriginalExtension(); // getting image extension
				$fileName = rand(11111,99999).'.'.$extension; // renameing image
				$request->file('file')->move($destinationPath, $fileName);
			  $school->photo = $fileName; // upload path
			}
        }
        $stamp = $request->file('stamp');
        if($stamp){
			$extensions = ["jpg" , "jpeg", "png"];
			$isImage = $stamp->getClientOriginalExtension(); 
			if (in_array($isImage, $extensions)){
				$destinationPath = public_path().'/ev-assets/uploads/school-images';
				$extension = $stamp->getClientOriginalExtension(); // getting image extension
				$fileName = rand(11111,99999).'.'.$extension; // renameing image
				$request->file('stamp')->move($destinationPath, $fileName);
			  $school->photo = $fileName; // upload path
			}
        }
        $school->save();
        
		$success = "Data is updated";
        return back()->with('success',$success);
        
    }
    //destroy an existing school
	public function destroy_school(Request $request, $id)
	{
		if(!Auth::user()->permission('add_school'))
			return redirect('dashboard');
		$post = School::find($id);
		$post->status = 0;
		$post->save();
		$post->delete();
		
		$success = "Data is deleted";
        return back()->with('success',$success);
	}


	public function upload_bulk_ca_test()
	{	
		if(!Auth::user()->permission('view_exams'))
			return redirect('dashboard');
		$exams = Exam::all();
		return view('admin.exam.ca-test-bulk')->with(compact(['exams']));
	}

	public function store_bulk_ca_test(Request $request)
	{	
		if(!Auth::user()->permission('add_tests'))
			return redirect('dashboard');
		$term_id = $request->get('term_id');
		$subject_id = $request->get('subject_id');
		$file = $request->file('import_file');
		if($file){
			$path = $file->getRealPath();
			$data = Excel::load($path, function($reader) {
			})->get();
			if(!empty($data) && $data->count()){
				foreach ($data as $key => $value) {
					$getQuestion = CATest::where('subject_id', $subject_id)->where('term_id', $term_id)->where('student_id', $value->student_id)->first();
					if($getQuestion){
						if($subject_id == $value->subject_id){
							$getQuestion->second = $value->second;
							$getQuestion->obedience = $value->obedience;
							$getQuestion->honesty = $value->honesty;
							$getQuestion->self_reliance = $value->self_reliance;
							$getQuestion->self_control = $value->self_control;
							$getQuestion->use_of_initiative = $value->use_of_initiative;
							$getQuestion->punctuality = $value->punctuality;
							$getQuestion->general_neatness = $value->general_neatness;
							$getQuestion->industry_or_perserverance = $value->industry_or_perserverance;
							$getQuestion->attendance_in_class = $value->attendance_in_class;
							$getQuestion->attentiveness = $value->attentiveness;
							$getQuestion->handwriting = $value->handwriting;
							$getQuestion->sports_and_games = $value->sports_and_games;
							$getQuestion->verbal_communication = $value->verbal_communication;
							$getQuestion->manual_skills = $value->manual_skills;
							$getQuestion->handling_musical_instruments = $value->handling_musical_instruments;
							$getQuestion->vacation_date = $value->vacation_date;
							$getQuestion->resumption = $value->resumption;
							$getQuestion->teacher_comment = $value->teacher_comment;
							$getQuestion->teacher_id = $value->teacher_id;
							$getQuestion->principal_comment = $value->principal_comment;
							$getQuestion->status = $value->status;
							$getQuestion->class_id = $value->class_id;
							$getQuestion->first_a = $value->first_a;
							$getQuestion->first_b = $value->first_b;
							$getQuestion->first_c = $value->first_c;
							$getQuestion->save();
						}
					}
					else{
						if($subject_id == $value->subject_id){
							$tests = new CATest();
							$tests->term_id = $term_id;
							$tests->subject_id = $subject_id;
							$tests->student_id = $value->student_id;
							$tests->second = $value->second;
							$tests->obedience = $value->obedience;
							$tests->honesty = $value->honesty;
							$tests->self_reliance = $value->self_reliance;
							$tests->self_control = $value->self_control;
							$tests->use_of_initiative = $value->use_of_initiative;
							$tests->punctuality = $value->punctuality;
							$tests->general_neatness = $value->general_neatness;
							$tests->industry_or_perserverance = $value->industry_or_perserverance;
							$tests->attendance_in_class = $value->attendance_in_class;
							$tests->attentiveness = $value->attentiveness;
							$tests->handwriting = $value->handwriting;
							$tests->sports_and_games = $value->sports_and_games;
							$tests->verbal_communication = $value->verbal_communication;
							$tests->manual_skills = $value->manual_skills;
							$tests->handling_musical_instruments = $value->handling_musical_instruments;
							$tests->vacation_date = $value->vacation_date;
							$tests->resumption = $value->resumption;
							$tests->teacher_comment = $value->teacher_comment;
							$tests->teacher_id = $value->teacher_id;
							$tests->principal_comment = $value->principal_comment;
							$tests->status = $value->status;
							$tests->first_a = $value->first_a;
							$tests->first_b = $value->first_b;
							$tests->first_c = $value->first_c;
							$tests->class_id = $value->class_id;
							$tests->save();
						}
					}
				}
				
				$success = "Data is added";
				return back()->with('success',$success);
			}
			else{
				$error = "unable to upload file";
				return back()->with('error',$error);
			}
		}
		else{
			$error = "No file is found";
			return back()->with('error',$error);
		}
	}


	public function upload_bulk_exam()
	{	
		if(!Auth::user()->permission('view_exams'))
			return redirect('dashboard');
		$exams = Exam::all();
		return view('admin.exam.exam-bulk')->with(compact(['exams']));
	}

	public function store_bulk_exam(Request $request)
	{	
		if(!Auth::user()->permission('add_tests'))
			return redirect('dashboard');
		$term_id = $request->get('term_id');
		$subject_id = $request->get('subject_id');
		$file = $request->file('import_file');
		if($file){
			$path = $file->getRealPath();
			$data = Excel::load($path, function($reader) {
			})->get();
			if(!empty($data) && $data->count()){
				foreach ($data as $key => $value) {
					$getQuestion = Mark::where('subject_id', $subject_id)->where('term_id', $term_id)->where('student_id', $value->student_id)->first();
					if($getQuestion){
						if($subject_id == $value->subject_id){
							$getQuestion->mark_obtained = $value->mark_obtained;
							$getQuestion->comment = $value->comment;
							$getQuestion->obedience = $value->obedience;
							$getQuestion->honesty = $value->honesty;
							$getQuestion->self_reliance = $value->self_reliance;
							$getQuestion->self_control = $value->self_control;
							$getQuestion->use_of_initiative = $value->use_of_initiative;
							$getQuestion->punctuality = $value->punctuality;
							$getQuestion->general_neatness = $value->general_neatness;
							$getQuestion->industry_or_perserverance = $value->industry_or_perserverance;
							$getQuestion->attendance_in_class = $value->attendance_in_class;
							$getQuestion->attentiveness = $value->attentiveness;
							$getQuestion->handwriting = $value->handwriting;
							$getQuestion->sports_and_games = $value->sports_and_games;
							$getQuestion->verbal_communication = $value->verbal_communication;
							$getQuestion->manual_skills = $value->manual_skills;
							$getQuestion->handling_musical_instruments = $value->handling_musical_instruments;
							$getQuestion->vacation_date = $value->vacation_date;
							$getQuestion->resumption = $value->resumption;
							$getQuestion->teacher_comment = $value->teacher_comment;
							$getQuestion->teacher_id = $value->teacher_id;
							$getQuestion->principal_comment = $value->principal_comment;
							$getQuestion->status = $value->status;
							$getQuestion->class_id = $value->class_id;
							$getQuestion->save();
						}
					}
					else{
						if($subject_id == $value->subject_id){
							$mark = new Mark();
							$mark->term_id = $term_id;
							$mark->subject_id = $subject_id;
							$mark->student_id = $value->student_id;
							$mark->class_id = $value->class_id;
							$mark->mark_obtained = $value->mark_obtained;
							$mark->comment = $value->comment;
							$mark->obedience = $value->obedience;
							$mark->honesty = $value->honesty;
							$mark->self_reliance = $value->self_reliance;
							$mark->self_control = $value->self_control;
							$mark->use_of_initiative = $value->use_of_initiative;
							$mark->punctuality = $value->punctuality;
							$mark->general_neatness = $value->general_neatness;
							$mark->industry_or_perserverance = $value->industry_or_perserverance;
							$mark->attendance_in_class = $value->attendance_in_class;
							$mark->attentiveness = $value->attentiveness;
							$mark->handwriting = $value->handwriting;
							$mark->sports_and_games = $value->sports_and_games;
							$mark->verbal_communication = $value->verbal_communication;
							$mark->manual_skills = $value->manual_skills;
							$mark->handling_musical_instruments = $value->handling_musical_instruments;
							$mark->vacation_date = $value->vacation_date;
							$mark->resumption = $value->resumption;
							$mark->teacher_comment = $value->teacher_comment;
							$mark->teacher_id = $value->teacher_id;
							$mark->principal_comment = $value->principal_comment;
							$mark->status = $value->status;
							$mark->save();
						}
					}
				}
				$success = "Data is added";
				return back()->with('success',$success);
			}
			else{

				$error = "unable to upload file";
				return back()->with('error',$error);
			}
			
		}
		else{
			$error = "No file is found";
			return back()->with('error',$error);
		}
	}
	public function show_ca_test()
	{	
		if(!Auth::user()->permission('view_exams'))
			return redirect('dashboard');
		$exams = Exam::all();
		return view('admin.exam.ca-test')->with(compact(['exams']));
	}
	public function update_ca_test(Request $request)
	{
		if(!Auth::user()->permission('add_exam'))
			return redirect('dashboard');
		$validator = Validator::make($request->all(), [
            'term_id' => array('Regex:/^[0-9]+$/'),
            'subject_id' => array('Regex:/^[0-9]+$/'),
            'class_id' => array('Regex:/^[0-9]+$/'),
   		]);
   		if ($validator->fails()) {
			$error = "All fields are required";
			return redirect('ca-tests')->with('error',$error);
		}
		if($request->get('term_id') && $request->get('class_id') && $request->get('subject_id')){
			$success = "Test is updated";
			return redirect('ca-tests/'.$request->get('term_id').'/'.$request->get('class_id').'/'.$request->get('subject_id'))->with('success',$success);
		}
		else {
		 	return back();
			$error = "Update failed";
			return back()->with('error',$error);
		}
	}
	public function view_ca_test($term, $class, $subject)
	{
		$students = User::where('role', 'student')->where('class_id', $class)->get();
		if($students && $students->count() > 0){
			$class_id = $class;
			$term_id = $term;
			$subject_id = $subject;
			foreach($students as $student){
				$student->ca_test = CATest::where('subject_id', $subject_id)->where('term_id', $term_id)->where('student_id', $student->id)->first();
			}
			return view('admin.exam.ca-test-mark')->with(compact(['students', 'class_id', 'term_id', 'subject_id']));
		}
		else{
			$error = "No student found";
			return redirect('ca-tests')->with('error',$error);
		}
	}
	public function store_ca_test(Request $request)
	{
		if(!Auth::user()->permission('add_mark'))
			return redirect('dashboard');
		foreach($request->get('student_id') as $key => $eachStudent){
			$subject = $request->get('subject_id');
			$student = $eachStudent;
			$first = $request->get('first')[$key];
			$second = $request->get('second')[$key];
			$term = $request->get('term_id');
			$getTest = CATest::where('subject_id', $subject)->where('student_id', $student)->where('term_id', $term)->first();
			if(is_null($getTest)){
				$mark = new CATest();
				$mark->subject_id = $subject;
				$mark->term_id = $term;
				$mark->student_id = $student;
				$mark->first_a = $first;
				$mark->second = $second;
				$mark->save();
			}
			else{
				CATest::where('student_id',$student)->where('subject_id', $subject)->where('term_id', $term)->
				update(['first' => $first,'second' => $second]);
			}
		}
		$success = "Data is added";
		return back()->with('success',$success);
	}


	// shows the list of exams
	public function show_exam()
	{	
		if(!Auth::user()->permission('view_exams'))
			return redirect('dashboard');
		$exams = Exam::all();
		return view('admin.exam.list')->with(compact(['exams']));
	}
	//stores new exam to database
	public function store_exam(Request $request)
	{
		if(!Auth::user()->permission('add_exam'))
			return redirect('dashboard');
		$validator = Validator::make($request->all(), [
            'name' => array('Regex:/^[A-Za-z0-9 ]+$/'),
   		]);
   		if ($validator->fails()) {
   			return back();
   		}
		$exam = new Exam();
		$exam->name = $request->get('name');
		$exam->date = $request->get('date');
		$exam->term_id = $request->get('term_id');
		$exam->comment = $request->get('comment');
		$exam->save();
		$success = "Exam is added";
		return redirect('exam/exam_list')->with('success',$success);
	}
	//updates already created exams
	public function update_exam(Request $request)
	{
		if(!Auth::user()->permission('add_exam'))
			return redirect('dashboard');
		$validator = Validator::make($request->all(), [
            'name' => array('Regex:/^[A-Za-z0-9 ]+$/'),
   		]);
   		if ($validator->fails()) {
   			return back();
   		}
		$exam = Exam::find($request->get('id'));
		if($exam){
			$exam->name = $request->get('name');
			$exam->term_id = $request->get('term_id');
			$exam->date = $request->get('date');
			$exam->comment = $request->get('comment');
			$exam->save();
		}
		$success = "Data is updated";
		return back()->with('success',$success);
        
    }
    //destroy an existing exam
	public function destroy_exam(Request $request, $id)
	{
		if(!Auth::user()->permission('add_exam'))
			return redirect('dashboard');
		$post = Exam::find($id);
		$post->delete();
		$success = "Data is deleted";
		return redirect('exam/exam_list')->with('success',$success);
	}
	// shows the list of gallery
	public function show_gallery()
	{	
		$galleries = Gallery::orderBy('created_at','desc')->get();
		return view('admin.gallery.list')->with(compact(['galleries']));
	}

	// shows the list of messages
	public function show_message()
	{	
		$students = Auth::user()->admin_type == 'super' ? User::where('role', 'student')->get() : User::where('role', 'student')->where('school_id', Auth::user()->school_id)->get();	
		$parents = Auth::user()->admin_type == 'super' ? User::where('role', 'parent')->get() : User::where('role', 'parent')->where('school_id', Auth::user()->school_id)->get();	
		$teachers = Auth::user()->admin_type == 'super' ? User::where('role', 'teacher')->get() : User::where('role', 'teacher')->where('school_id', Auth::user()->school_id)->get();	
		$admins = Auth::user()->admin_type == 'super' ? User::where('role', 'admin')->get() : User::where('role', 'admin')->where('school_id', Auth::user()->school_id)->get();  	
		$authe = Auth::user();
		$messages = Message::where('to',$authe->id)->orderBy('created_at','desc')->get();
		$count = Message::where('active','0')->where('to',$authe->id)->count();
		return view('admin.messages.list')->with(compact(['authe','messages','count','students','teachers','parents','admins']));
	}
	//shows messages according to the selected role
	public function show_message_by_role($role)
	{	
		$senderinfo = User::where('role', 'student')->orderBy('created_at','desc')->paginate();
		$students = Auth::user()->admin_type == 'super' ? User::where('role', 'student')->get() : User::where('role', 'student')->where('school_id', Auth::user()->school_id)->get();	
		$parents = Auth::user()->admin_type == 'super' ? User::where('role', 'parent')->get() : User::where('role', 'parent')->where('school_id', Auth::user()->school_id)->get();	
		$teachers = Auth::user()->admin_type == 'super' ? User::where('role', 'teacher')->get() : User::where('role', 'teacher')->where('school_id', Auth::user()->school_id)->get();	
		$admins = Auth::user()->admin_type == 'super' ? User::where('role', 'admin')->get() : User::where('role', 'admin')->where('school_id', Auth::user()->school_id)->get(); 
		$role = $role; 	
		$messages = Message::orderBy('created_at','desc')->get(10);
		$count = Message::where('active','0');
		$authe = Auth::user();
		return view('admin.messages.rolelist')->with(compact(['authe','messages','senderinfo','count','students','teachers','parents','admins','role']));
	}
	//displays sent messages by user
	public function show_sent_message()
	{	
		$students = Auth::user()->admin_type == 'super' ? User::where('role', 'student')->get() : User::where('role', 'student')->where('school_id', Auth::user()->school_id)->get();	
		$parents = Auth::user()->admin_type == 'super' ? User::where('role', 'parent')->get() : User::where('role', 'parent')->where('school_id', Auth::user()->school_id)->get();	
		$teachers = Auth::user()->admin_type == 'super' ? User::where('role', 'teacher')->get() : User::where('role', 'teacher')->where('school_id', Auth::user()->school_id)->get();
		$admins = Auth::user()->admin_type == 'super' ? User::where('role', 'admin')->get() : User::where('role', 'admin')->where('school_id', Auth::user()->school_id)->get(); 
		$authe = Auth::user(); 
		$senderinfo = User::where('role', 'student')->orderBy('created_at','desc')->get();
		$messages = Message::where('from',$authe->id)->orderBy('created_at','desc')->get();
		$count = Message::where('active','0')->where('to',$authe->id)->count();
		return view('admin.messages.sent')->with(compact(['authe','messages','senderinfo','count','students','teachers','parents','admins']));
	}
	//view selected messages
	public function view_message($id)
	{	
		$students = Auth::user()->admin_type == 'super' ? User::where('role', 'student')->get() : User::where('role', 'student')->where('school_id', Auth::user()->school_id)->get();	
		$parents = Auth::user()->admin_type == 'super' ? User::where('role', 'parent')->get() : User::where('role', 'parent')->where('school_id', Auth::user()->school_id)->get();	
		$teachers = Auth::user()->admin_type == 'super' ? User::where('role', 'teacher')->get() : User::where('role', 'teacher')->where('school_id', Auth::user()->school_id)->get();
		$admins = Auth::user()->admin_type == 'super' ? User::where('role', 'admin')->get() : User::where('role', 'admin')->where('school_id', Auth::user()->school_id)->get();  
		$senderinfo = User::where('role', 'student')->orderBy('created_at','desc')->paginate();
		$replies = Reply::orderBy('created_at','desc')->get();
		$messages = Message::where('id',$id)->first();
		$authe = Auth::user();
		$count = Message::where('active','0')->where('to',$authe->id)->count();
		if ($messages && (($messages->from == $authe->id) || ($messages->to == $authe->id))) {
			return view('admin.messages.view')->with(compact(['messages','authe','senderinfo','replies','students','teachers','parents','admins','count']));
		}
		else{
			$error = "Message not found";
			return redirect('messages')->with('error',$error);
		}
	}
	public function store_message(Request $request)
	{
		$messages = new Message();
		$messages->from = $request->get('from');
		$messages->from_role = $request->get('from_role');
		$recipient =  $request->get('recipient');
        $getval = explode(',',$recipient);
        $messages->to = $getval[0];
        $messages->to_role = $getval[1];
        $messages->title = $request->get('title');
        $messages->body = $request->get('body');
		$messages->active = 0;
		$messages->save();
		$success = "Message sent successfully";
		return back()->with('success',$success);
	}

	public function store_reply(Request $request)
	{
		$reply = new Reply();
		$reply->message_id = $request->get('message_id');
		$reply->body = strip_tags($request->get('body'));
        $reply->author_id = $request->get('author_id');
        $reply->author_role = $request->get('author_role');
		$reply->active = 1;
		$reply->save();
		$message = Message::find($request->get('message_id'));
		$message->active = 0;
		$message->save();
		$success = "Reply sent";
		return back()->with('success',$success);
	}
	public function destroy_message_reply(Request $request, $id)
	{
		$post = Reply::find($id);
		$post->delete();
		$success = "Message reply deleted";
		return back()->with('success',$success);
	}
	public function send_bulk_message(Request $request)
	{	
		if(!Auth::user()->permission('is_admin'))
			return redirect('dashboard');
		$settings = Settings::find(1);
		$auth = Auth::user();
		$classes = Classes::get_classes();
		$class = Classes::get_classes();
		$teacher = User::where('role', 'teacher')->orderBy('created_at','desc')->paginate();
		$message = trans('topbar_menu_lang.success');
		return view('admin.messages.bulk')->with(compact(['teacher','settings','class','auth','message']));
	}
	public function store_bulk_message(Request $request)
	{
		if(!Auth::user()->permission('is_admin'))
			return redirect('dashboard');
		$validator = Validator::make($request->all(), [
            'body' => array('Regex:/^[A-Za-z0-9 ]+$/'),
   		]);
   		if ($validator->fails()) {
   			return back();
   		}
		if ($request->get('to') == 'student') {
			$students = Auth::user()->admin_type == 'super' ? User::where('role', 'student')->get() : User::where('role', 'student')->where('school_id', Auth::user()->school_id)->get();
			foreach ($students as $key => $value) {
				$messages = new Message();
				$messages->from = $request->get('from');
				$messages->from_role = $request->get('from_role');
				$messages->to = $value->id;
		        $messages->to_role = $value->role;
		        $messages->title = $request->get('title');
		        $messages->body = $request->get('body');
				$messages->active = "0";
				$messages->save();
			}
		}
		elseif ($request->get('to') == 'parent') {
			$parents = Auth::user()->admin_type == 'super' ? User::where('role', 'parent')->get() : User::where('role', 'parent')->where('school_id', Auth::user()->school_id)->get();
			foreach ($parents as $key => $value) {
				$messages = new Message();
				$messages->from = $request->get('from');
				$messages->from_role = $request->get('from_role');
				$messages->to = $value->id;
		        $messages->to_role = $value->role;
		        $messages->title = $request->get('title');
		        $messages->body = $request->get('body');
				$messages->active = "0";
				$messages->save();
			}
		}
		elseif ($request->get('to') == 'teacher') {
			$teachers = Auth::user()->admin_type == 'super' ? User::where('role', 'teacher')->get() : User::where('role', 'teacher')->where('school_id', Auth::user()->school_id)->get();
			foreach ($teachers as $key => $value) {
				$messages = new Message();
				$messages->from = $request->get('from');
				$messages->from_role = $request->get('from_role');
				$messages->to = $value->id;
		        $messages->to_role = $value->role;
		        $messages->title = $request->get('title');
		        $messages->body = $request->get('body');
				$messages->active = "0";
				$messages->save();
			}
		}
		elseif ($request->get('to') == 'admin') {
			$parents = Auth::user()->admin_type == 'super' ? User::where('role', 'admin')->get() : User::where('role', 'admin')->where('school_id', Auth::user()->school_id)->get();
			foreach ($parents as $key => $value) {
				$messages = new Message();
				$messages->from = $request->get('from');
				$messages->from_role = $request->get('from_role');
				$messages->to = $value->id;
		        $messages->to_role = $value->role;
		        $messages->title = $request->get('title');
		        $messages->body = $request->get('body');
				$messages->active = "0";
				$messages->save();
			}
		}
		
        $success = "Bulk message sent";
		return back()->with('success',$success);
	}
	public function send_email(Request $request)
	{	
		if(!Auth::user()->permission('is_admin'))
			return redirect('dashboard');
		$settings = Settings::find(1);
		$auth = Auth::user();
		$classes = Classes::get_classes();
		$class = Classes::get_classes();
		$teacher = User::where('role', 'teacher')->orderBy('created_at','desc')->paginate();
		return view('admin.messages.email')->with(compact(['teacher','settings','class','auth']));
	}
	public function store_email(Request $request)
	{
		if(!Auth::user()->permission('is_admin'))
			return redirect('dashboard');
		$validator = Validator::make($request->all(), [
            'title' => array('Regex:/^[A-Za-z0-9 ]+$/'),
            'body' => array('Regex:/^[A-Za-z0-9 ]+$/'),
   		]);
   		if ($validator->fails()) {
   			return back();
   		}
		$settings = Settings::find(1);
		$title = $request->get('title');
        $content = $request->get('body');
		if ($request->get('to') == 'student') {
			$students = Auth::user()->admin_type == 'super' ? User::where('role', 'student')->get() : User::where('role', 'student')->where('school_id', Auth::user()->school_id)->get();
			foreach ($students as $key => $value) {
				$isemail = $value->email;
				Mail::send('email', ['title' => $title, 'content' => $content], function ($message) use ($isemail,$content,$settings) {
    				$message->from($settings->system_email, $settings->system_name);
		            $message->to($isemail);
		            $message->subject($content);
				});
			}
		}
		elseif ($request->get('to') == 'parent') {
			$parents = Auth::user()->admin_type == 'super' ? User::where('role', 'parent')->get() : User::where('role', 'parent')->where('school_id', Auth::user()->school_id)->get();
			foreach ($parents as $em ) {
				$isemail = $em->email;
				Mail::send('email', ['title' => $title, 'content' => $content], function ($message) use ($isemail,$content,$settings) {
    				$message->from($settings->system_email, $settings->system_name);
		            $message->to($isemail);
		            $message->subject($content);
				});
				
			}
		}
		elseif ($request->get('to') == 'teacher') {
			$teachers = Auth::user()->admin_type == 'super' ? User::where('role', 'teacher')->get() : User::where('role', 'teacher')->where('school_id', Auth::user()->school_id)->get();
			foreach ($teachers as $key => $value) {
				$isemail = $value->email;
				Mail::send('email', ['title' => $title, 'content' => $content], function ($message) use ($isemail,$content,$settings) {
    				$message->from($settings->system_email, $settings->system_name);
		            $message->to($isemail);
		            $message->subject($content);
				});
			}
		}
		elseif ($request->get('to') == 'admin') {
			$parents = Auth::user()->admin_type == 'super' ? User::where('role', 'admin')->get() : User::where('role', 'admin')->where('school_id', Auth::user()->school_id)->get();
			foreach ($parents as $key => $value) {
				$isemail = $value->email;
				Mail::send('email', ['title' => $title, 'content' => $content], function ($message) use ($isemail,$content,$settings) {
    				$message->from($settings->system_email, $settings->system_name);
		            $message->to($isemail);
		            $message->subject($content);
				});
			}
		}
		$success = "Mail is sent";
		return back()->with('success',$success);
	}
	public function send_sms(Request $request)
	{	
		if(!Auth::user()->permission('is_admin'))
			return redirect('dashboard');
		$classes = Classes::get_classes();
		$class = Classes::get_classes();
		$teacher = User::where('role', 'teacher')->orderBy('created_at','desc')->paginate();
		return view('admin.messages.sms')->with(compact(['teacher','class']));
	}
	public function send_sms_now(Request $request)
	{
		if(!Auth::user()->permission('is_admin'))
			return redirect('dashboard');
		$body = $request->get('body');
		try {
			if ($request->get('to') == 'admin') {
				$admin = Auth::user()->admin_type == 'super' ? User::where('role', 'admin')->get() : User::where('role', 'admin')->where('school_id', Auth::user()->school_id)->get();
				foreach ($admin as $key => $value) {
				 if($value->phone && $value->phone !== ""){
					 $msg = [
						 'to'      => $value->phone,
						 'content' => $body,
					 ];
					 SMS::send($msg);
				 }
				}
			}
			elseif ($request->get('to') == 'teacher') {
				$admin = Auth::user()->admin_type == 'super' ? User::where('role', 'teacher')->get() : User::where('role', 'teacher')->where('school_id', Auth::user()->school_id)->get();
				foreach ($admin as $key => $value) {
				 if($value->phone && $value->phone !== ""){
					 $msg = [
						 'to'      => $value->phone,
						 'content' => $body,
					 ];
					 SMS::send($msg);
				 }
				}
			}
			elseif ($request->get('to') == 'parent') {
				$admin = Auth::user()->admin_type == 'super' ? User::where('role', 'parent')->get() : User::where('role', 'parent')->where('school_id', Auth::user()->school_id)->get();
				foreach ($admin as $key => $value) {
				 if($value->phone && $value->phone !== ""){
					 $msg = [
						 'to'      => $value->phone,
						 'content' => $body,
					 ];
					 SMS::send($msg);
				 }
				}
			}
			elseif ($request->get('to') == 'teacher') {
				$admin = Auth::user()->admin_type == 'super' ? User::where('role', 'teacher')->get() : User::where('role', 'teacher')->where('school_id', Auth::user()->school_id)->get();
				foreach ($admin as $key => $value) {
				 if($value->phone && $value->phone !== ""){
					 $msg = [
						 'to'      => $value->phone,
						 'content' => $body,
					 ];
					 SMS::send($msg);
				 }
				}
			}
			$message = trans('topbar_menu_lang.success');
			return back()->with(compact(['message']));
		} catch (Exception $ex) {
			$message = $ex;
			return back()->with(compact(['message']));
		}
   		
	}

	public function mark_test_view($id)
    {   
		if(!Auth::user()->permission('view_tests'))
			return redirect('dashboard');
		$testresult = TestResult::find($id);
		if($testresult){
			if($testresult->status == 1){
				$error = "This student test is already marked";
				return redirect('mark-test-question')->with('error',$error);
			}
			$questions = json_decode($testresult->questions);
			$answers = json_decode($testresult->answer);
			return view('admin.online_test.marktestview')->with(compact(['testresult', 'questions', 'answers', 'id']));
		}
		else{
			$error = "Test result not found";
			return back()->with('error',$error);
		}
	}

	public function review_test_result($id)
    {   
		if(!Auth::user()->permission('view_tests'))
			return redirect('dashboard');
		$testresult = TestResult::find($id);
		if($testresult){
			$questions = json_decode($testresult->questions);
			$mark_point = json_decode($testresult->mark_point);
			$mark_action = json_decode($testresult->mark_action);
			$answers = json_decode($testresult->answer);
			return view('admin.online_test.reviewtestview')->with(compact(['testresult', 'questions', 'answers','mark_point','mark_action']));
		}
		else{
			$error = "Test result not found";
			return back()->with('error',$error);
		}
	}

	public function mark_test_question(Request $request)
    {   
		
		if(!Auth::user()->permission('view_tests'))
			return redirect('dashboard');
        $tests = Test::where('user_id', auth()->user()->id)->orderBy('created_at','asc')->get();
		$subject = Subject::all();
		$test_id = $request['test_id'];
		// return $request;
		if($request['test_id']){
			$results = TestResult::where('test_id', $request['test_id'])->get();
			return view('admin.online_test.marktest')->with(compact(['tests', 'subject', 'test_id','results']));
        }
        return view('admin.online_test.marktest')->with(compact(['tests', 'subject', 'test_id']));
	}

	public function mark_test_store(Request $request)
    {   //dd($request);
		if(!Auth::user()->permission('view_tests'))
			return redirect('dashboard');
		$points = $request->get('point');
		$actions = $request->get('action');
		//dd($actions);
		$student_id = $request->get('student_id');
		$test_id = $request->get('test_id');
		$sum = 0;
		$mark_action = [];
		foreach ($actions as $key => $value) {
			$mark_action[] = $value[0];
			if(isset($value[0]) && $value[0] == 0){
				if(isset($points[$key])){
					$sum += $points[$key];
				}
			}
		}
		$testresult = TestResult::where('test_id', $test_id)->where('student_id', $student_id)->first();
		if($testresult){
			$testresult->score = $sum;
			$testresult->status = 1;
			$testresult->mark_point = json_encode($points);
			$testresult->mark_action = json_encode($mark_action);
			$testresult->save();
			$success = "Test script is marked";
			return redirect('mark-test-question')->with('success',$success);
		}
		else{
			$error = "Test result not found";
			return back()->with('error',$error);
		}
        
	}


	public function online_test()
    {   
		if(!Auth::user()->permission('view_tests'))
			return redirect('dashboard');
        $tests = Test::orderBy('created_at','desc')->get();
        $subject = Subject::all();
        return view('admin.online_test.showtest')->with(compact(['tests','subject']));
	}
	public function my_test_library()
    {   
		if(!Auth::user()->permission('view_tests'))
			return redirect('dashboard');
		//$alltests = Test::where('global', 1)->orderBy('created_at','desc')->get();
		$alltests = Test::all();
		$tests = Test::where('user_id', auth()->user()->id)->orderBy('created_at','desc')->get();
        $subject = Subject::all();
        return view('admin.online_test.myshowtest')->with(compact(['alltests','tests','subject']));
	}
	public function create_test()
    {   
		if(!Auth::user()->permission('view_tests'))
			return redirect('dashboard');
        return view('admin.online_test.createtest');
    }
	public function select_quiz_type($type)
    {   
        return view('admin.online_test.quiz-type')->with(compact(['type']));
    }
    public function store_test(Request $request)
	{
		$questions = $request->get('question');
		$ids = $request->get('id');
		$types = $request->get('type');
		$points = $request->get('point');
		$options = $request->get('option');
		$files = $request->file('file');
		if ($questions && count($questions) > 0) {
			$tests = new Test();
			$tests->subject_id = $request->get('subject_id');
			$tests->class_id = $request->get('class_id');
			$tests->user_id = auth()->user()->id;
			$tests->duration = $request->get('duration');
			$tests->name = $request->get('name');
			$tests->redo = $request->get('redo');
			$tests->category = $request->get('category');
			$tests->status = $request->get('status');
			$tests->save();
			foreach ($questions as $key => $question) {
				$getid = $ids[$key];
				$gettype = $types[$key];
				$point = $points[$key];
				if(isset($getid) && isset($gettype)){
					$getOption = isset($options[$getid]) ? $options[$getid] : [];
					$getFiles = isset($files[$getid]) ? $files[$getid] : [];
					$testQuestion = new TestQuestion();
					$testQuestion->test_id = $tests->id;
					$testQuestion->question = $question;
					$testQuestion->point = $point;
					$testQuestion->type = $gettype;
					$testQuestion->order = $key;
					if($gettype == 'fillword' || $gettype == 'short'){
						$testQuestion->options = count($getOption);
					}
					if($gettype == 'file'){
						if(isset($getFiles[0])){
							$file = $getFiles[0];
							if($file){
								$destinationPath = public_path().'/ev-assets/uploads/test-files';
								$extension = $file->getClientOriginalExtension(); // getting image extension
								$fileName = rand(11111,99999).$getid.'.'.$extension; // renameing image
								$file->move($destinationPath, $fileName);
								$testQuestion->file = $fileName; // upload path
							}
						}
					}
					$testQuestion->save();
					if($gettype == 'options'){
						$corrects = $request->get('correct');
						$getCorrect = $corrects[$getid];
						foreach ($getOption as $idx => $option) {
							$testOption = new TestOption();
							$testOption->question_id = $testQuestion->id;
							$testOption->option = $option;
							$testOption->correct = $getCorrect[$idx];
							$testOption->save();
						}
					}
				}
			}
			$success = "Questions Added";
			return redirect('online_test')->with('success',$success);
		}
		else{
			$error = "Minimum of 1 question is expected";
			return back()->with('error',$error);
		}
	}
	public function edit_test($id)
    {   
		if(!Auth::user()->permission('view_tests'))
			return redirect('dashboard');
		$test = Test::find($id);
		if($test){
			$testQuestions = TestQuestion::where('test_id', $test->id)->get();
			return view('admin.online_test.edittest')->with(compact(['test', 'testQuestions']));
		}
		else{
			$error = "Test not found";
			return redirect('online_test')->with('error',$error);
		}
    }
	public function update_test(Request $request)
	{
		if(!Auth::user()->permission('add_tests'))
			return redirect('dashboard');
		$questions = $request->get('question');
		$ids = $request->get('id');
		$types = $request->get('type');
		$points = $request->get('point');
		$options = $request->get('option');
		$fileedit = $request->get('fileedit');
		$files = $request->file('file');
		$test_id = $request->get('test_id');
		$tests = Test::find($test_id);
		if($tests){
			if ($questions && count($questions) > 0) {
				$tests->subject_id = $request->get('subject_id');
				$tests->class_id = $request->get('class_id');
				$tests->duration = $request->get('duration');
				$tests->name = $request->get('name');
				$tests->redo = $request->get('redo');
				$tests->category = $request->get('category');
				$tests->status = $request->get('status');
				if($request->get('global')){
					$tests->global = $request->get('global');
				}
				$tests->save();
				$delQuestion = TestQuestion::where('test_id', $tests->id)->get();
				foreach ($delQuestion as $dq) {
					$opt = TestOption::where('question_id', $dq->id)->get();
					foreach ($opt as $op) {
						$op->delete();
					}
					$dq->delete();
				}
				foreach ($questions as $key => $question) {
					$getid = $ids[$key];
					$gettype = $types[$key];
					$point = $points[$key];
					if(isset($getid) && isset($gettype)){
						$getOption = isset($options[$getid]) ? $options[$getid] : [];
						$getFiles = isset($files[$getid]) ? $files[$getid] : [];
						$filetoedit = isset($fileedit[$getid]) ? $fileedit[$getid] : [];

						$testQuestion = new TestQuestion();
						$testQuestion->test_id = $tests->id;
						$testQuestion->question = $question;
						$testQuestion->point = $point;
						$testQuestion->type = $gettype;
						$testQuestion->order = $key;
						if($gettype == 'fillword' || $gettype == 'short'){
							$testQuestion->options = count($getOption);
						}
						if($gettype == 'file'){
							if(isset($getFiles[0])){
								$file = $getFiles[0];
								if($file){
									$destinationPath = public_path().'/ev-assets/uploads/test-files';
									$extension = $file->getClientOriginalExtension(); // getting image extension
									$fileName = rand(11111,99999).$getid.'.'.$extension; // renameing image
									$file->move($destinationPath, $fileName);
									$testQuestion->file = $fileName; // upload path
								}
							}
							elseif (isset($filetoedit[0])) {
								$testQuestion->file = $filetoedit[0];
							}
						}
						$testQuestion->save();
						if($gettype == 'options'){
							$corrects = $request->get('correct');
							$getCorrect = $corrects[$getid];
							foreach ($getOption as $idx => $option) {
								$testOption = new TestOption();
								$testOption->question_id = $testQuestion->id;
								$testOption->option = $option;
								$testOption->correct = $getCorrect[$idx];
								$testOption->save();
							}
						}
					}
				}
				$success = "Questions updated";
				return back()->with('success',$success);
			}
			else{
				$error = "Minimum of 1 question is expected";
				return back()->with('error',$error);
			}
		}
		else{
			$error = "Test not found";
			return back()->with('error',$error);
		}
    }
	public function destroy_test(Request $request, $id)
	{
		if(!Auth::user()->permission('add_tests'))
			return redirect('dashboard');
		$tests = Test::find($id);
		if($tests){
			$delQuestion = TestQuestion::where('test_id', $tests->id)->get();
			foreach ($delQuestion as $dq) {
				$opt = TestOption::where('question_id', $dq->id)->get();
				foreach ($opt as $op) {
					$op->delete();
				}
				$dq->delete();
			}
			$tests->delete();
			
			$success = "Data is deleted";
			return back()->with('success',$success);
		}
		else{
			$error = "Test not found";
			return back()->with('error',$error);
		}
	}
	public function add_test_question()
    {   
		if(!Auth::user()->permission('add_tests'))
			return redirect('dashboard');
        $tests = Test::orderBy('created_at','asc')->paginate();
        return view('admin.online_test.showtestlist')->with(compact(['tests']));
    }
    public function view_test_question($id)
    {   
		if(!Auth::user()->permission('add_tests'))
			return redirect('dashboard');
        $tests = TestQuestion::where('test_id',$id)->orderBy('created_at','asc')->paginate();
        $test_id = $id;
        return view('admin.online_test.showquestions')->with(compact(['tests','test_id']));
    }
    public function store_test_question(Request $request)
	{
		if(!Auth::user()->permission('add_tests'))
			return redirect('dashboard');
		$tests = new TestQuestion();
		$tests->test_id = $request->get('test_id');
		$tests->question = $request->get('question');
		$tests->option_a = $request->get('option_a');
		$tests->option_b = $request->get('option_b');
		$tests->option_c = $request->get('option_c');
		$tests->option_d = $request->get('option_d');
		$correct_answer = $request->get('correct_answer');
		$tests->correct_answer = $request->get($correct_answer);
		$tests->save();
		$success = "Data is saved";
		return back()->with('success',$success);
	}
	public function update_test_question(Request $request)
	{
		if(!Auth::user()->permission('add_tests'))
			return redirect('dashboard');
        $tests = TestQuestion::find($request->get('id'));
		$tests->test_id = $request->get('test_id');
		$tests->question = $request->get('question');
		$tests->option_a = $request->get('option_a');
		$tests->option_b = $request->get('option_b');
		$tests->option_c = $request->get('option_c');
		$tests->option_d = $request->get('option_d');
		$correct_answer = $request->get('correct_answer');
		$tests->correct_answer = $request->get($correct_answer);
        $tests->save();
		$success = "Data is updated";
		return back()->with('success',$success);
        
    }
    public function destroy_test_question(Request $request, $id)
	{
		if(!Auth::user()->permission('add_tests'))
			return redirect('dashboard');
		$post = TestQuestion::find($id);
		$post->delete();
		$success = "Data is deleted";
        return back()->with('success',$success);
	}
	public function add_bulk_test_question(Request $request)
	{	
		if(!Auth::user()->permission('add_tests'))
			return redirect('dashboard');
		$tests = Test::all();
		return view('admin.online_test.bulktest')->with(compact(['tests']));
	}
	//this will store bulk students at once
	public function store_bulk_test_question(Request $request)
	{	
		if(!Auth::user()->permission('add_tests'))
			return redirect('dashboard');
		$test_id = $request->get('test_id');
		$file = $request->file('import_file');
		if($file){
			$path = $file->getRealPath();
			$data = Excel::load($path, function($reader) {
			})->get();
			if(!empty($data) && $data->count()){
				foreach ($data as $key => $value) {
					$tests = new TestQuestion();
					$tests->test_id = $test_id;
					$tests->question = $value->question;
					$tests->option_a = $value->option_a;
					$tests->option_b = $value->option_b;
					$tests->option_c = $value->option_c;
					$tests->option_d = $value->option_d;
					$corr = $value->correct_answer;
					$tests->correct_answer = $value->$corr;
					$tests->save();
				}
			}
			$success = "Data is saved";
			return back()->with('success',$success);
		}
		else
		{
			$error = "No file is uploaded";
			return back()->with('error',$error);
		}
	}
	public function show_post()
	{	
		$posts = Posts::orderBy('created_at','desc')->paginate(10);
		return view('admin.posts.listpost')->with(compact(['posts']));
	}
	public function view_blog($slug)
	{
		$post = Posts::where('slug',$slug)->first();

		if($post)
		{
			if($post->active == false)
				return redirect('/dashboard')->withErrors('requested page not found');
			$comments = $post->comments;	
		}
		else 
		{
			return redirect('/dashboard')->withErrors('requested page not found');
		}
		return view('admin.posts.show')->withPost($post)->withComments($comments);
	}

	//stores users comments on posts
	public function store_comment(Request $request)
	{
		$validator = Validator::make($request->all(), [
            'body' => array('Regex:/^[A-Za-z0-9 ]+$/'),
   		]);
   		if ($validator->fails() || strlen($request->get('body')) == 0) {
   			return back();
   		}
		$comments = new Comments();
		$comments->on_post = $request->get('on_post');
		$comments->body = $request->get('body');
        $comments->from_user = $request->get('from_user');
        $comments->from_user_role = $request->get('from_user_role');
		$comments->save();
		$success = "Comment is saved";
		return back()->with('success',$success);
	}

	// drop users comments on posts
	public function destroy_post_comment(Request $request, $id)
	{

		$post = Comments::find($id);
		$post->delete();
		
		$success = "Comment is deleted";
        return back()->with('success',$success);
	}

	// shows the list of exam grades
	public function show_grade()
	{	
		if(!Auth::user()->permission('view_grade'))
			return redirect('dashboard');
		$grades = Grade::orderBy('created_at','desc')->get();
		return view('admin.grade.list')->with(compact(['grades']));
	}
	public function store_grade(Request $request)
	{
		if(!Auth::user()->permission('add_grade'))
			return redirect('dashboard');
		$validator = Validator::make($request->all(), [
            'name' => array('Regex:/^[A-Za-z0-9 ]+$/'),
            'grade_point' => array('Regex:/^[A-Za-z0-9 ]+$/'),
            'mark_from' => array('Regex:/^[A-Za-z0-9 ]+$/'),
            'mark_upto' => array('Regex:/^[A-Za-z0-9 ]+$/'),
   		]);
   		if ($validator->fails()) {
   			return back();
   		}
		$grade = new Grade();
		$grade->name = $request->get('name');
		$grade->grade_point = $request->get('grade_point');
		$grade->mark_from = $request->get('mark_from');
		$grade->mark_upto = $request->get('mark_upto');
		$success = "Data is added";
		return back()->with('success',$success);
	}
	public function update_grade(Request $request)
	{
		if(!Auth::user()->permission('add_grade'))
			return redirect('dashboard');
		$validator = Validator::make($request->all(), [
            'name' => array('Regex:/^[A-Za-z0-9 ]+$/'),
            'grade_point' => array('Regex:/^[A-Za-z0-9 ]+$/'),
            'mark_from' => array('Regex:/^[A-Za-z0-9 ]+$/'),
            'mark_upto' => array('Regex:/^[A-Za-z0-9 ]+$/'),
   		]);
   		if ($validator->fails()) {
   			return back();
   		}
        $grade = Grade::find($request->get('id'));
		$grade->name = $request->get('name');
		$grade->grade_point = $request->get('grade_point');
		$grade->mark_from = $request->get('mark_from');
		$grade->mark_upto = $request->get('mark_upto');
        $grade->save();
        $success = "Data is updated";
		return back()->with('success',$success);
        
    }
	public function destroy_grade(Request $request, $id)
	{
		if(!Auth::user()->permission('add_grade'))
			return redirect('dashboard');
		$post = Grade::find($id);
		$post->delete();
		$success = "Data is deleted";
		return back()->with('success',$success);
	}
	// shows the list of expenses
	public function show_expense()
	{	
		if(!Auth::user()->permission('view_expenses'))
			return redirect('dashboard');
		$expenses = Expense::orderBy('created_at','desc')->get();
		$category = ExpenseCategory::orderBy('created_at','desc')->get();
		return view('admin.expense.expenselist')->with(compact(['expenses','category']));
	}
	public function store_expense(Request $request)
	{
		if(!Auth::user()->permission('add_expense'))
			return redirect('dashboard');
		$validator = Validator::make($request->all(), [
            'title' => array('Regex:/^[A-Za-z0-9 ]+$/'),
            'amount' => array('Regex:/^[A-Za-z0-9 ]+$/'),
   		]);
   		if ($validator->fails()) {
   			return back();
   		}
		$expense = new Expense();
		$expense->title = $request->get('title');
		$expense->category = $request->get('category');
		$expense->method = $request->get('method');
		$expense->amount = $request->get('amount');
		$expense->date = $request->get('date');
		$expense->save();
		$success = "Data is added";
		return back()->with('success',$success);
	}
	public function update_expense(Request $request)
	{
		if(!Auth::user()->permission('add_expense'))
			return redirect('dashboard');
		$validator = Validator::make($request->all(), [
            'title' => array('Regex:/^[A-Za-z0-9 ]+$/'),
            'amount' => array('Regex:/^[A-Za-z0-9 ]+$/'),
   		]);
   		if ($validator->fails()) {
   			return back();
   		}
		$expense = Expense::find($request->get('id'));
		$expense->title = $request->get('title');
		$expense->category = $request->get('category');
		$expense->method = $request->get('method');
		$expense->amount = $request->get('amount');
		$expense->date = $request->get('date');
		$expense->save();
		$success = "Data is updated";
		return back()->with('success',$success);
	}
	public function destroy_expense(Request $request, $id)
	{
		if(!Auth::user()->permission('add_expense'))
			return redirect('dashboard');
		$post = Expense::find($id);
		$post->delete();
		$success = "Data is deleted";
		return back()->with('success',$success);
	}
	// shows the list of expense categories
	public function show_expense_categories()
	{	
		if(!Auth::user()->permission('view_expense_category'))
			return redirect('dashboard');
		$expensecats = ExpenseCategory::orderBy('created_at','desc')->get();
		return view('admin.expense.expensecategory')->with(compact(['expensecats']));
	}
	public function store_expense_category(Request $request)
	{
		if(!Auth::user()->permission('add_expense_category'))
			return redirect('dashboard');
		$expense = new ExpenseCategory();
		$expense->name = $request->get('name');
		$expense->save();
		$success = "Data is added";
		return back()->with('success',$success);
	}
	public function update_expense_category(Request $request)
	{
		if(!Auth::user()->permission('add_expense_category'))
			return redirect('dashboard');
		$expense = ExpenseCategory::find($request->get('id'));
		$expense->name = $request->get('name');
		$expense->save();
		$success = "Data is updated";
		return back()->with('success',$success);
	}
	public function destroy_expense_category(Request $request, $id)
	{
		if(!Auth::user()->permission('add_expense_category'))
			return redirect('dashboard');
		$post = ExpenseCategory::find($id);
		$post->delete();
		$success = "Data is deleted";
		return back()->with('success',$success);
	}
	public function show_income()
	{	
		if(!Auth::user()->permission('view_invoice'))
			return redirect('dashboard');
		$incomes = Invoice::all();
		return view('admin.expense.incomelist')->with(compact(['incomes']));
	}
	public function show_payment()
	{	
		if(!Auth::user()->permission('view_payment'))
			return redirect('dashboard');
		$payments = Payment::all();
		$invoices = Invoice::orderBy('created_at','asc')->paginate();
		$student = User::where('role', 'student')->orderBy('created_at','desc')->paginate();
		return view('admin.expense.paymentlist')->with(compact(['payments','student','invoices']));
	}
	public function store_payment(Request $request)
	{
		if(!Auth::user()->permission('add_payment'))
			return redirect('dashboard');
		$validator = Validator::make($request->all(), [
            'title' => array('Regex:/^[A-Za-z0-9 ]+$/'),
            'amount' => array('Regex:/^[A-Za-z0-9 ]+$/'),
            'description' => array('Regex:/^[A-Za-z0-9 ]+$/'),
   		]);
   		if ($validator->fails()) {
   			return back();
   		}
		$invoice = new Invoice();
		$invoice->title = $request->get('title');
		$invoice->description = $request->get('description');
		$invoice->amount = $request->get('total_amount');
		$invoice->amount_paid = $request->get('amount');
		$invoice->student_id = $request->get('student_id');
		$invoice->payment_method = $request->get('method');
		$invoice->status = $request->get('status');
		$invoice->date = $request->get('date');
		$invoice->save();
		$payment = new Payment();
		$payment->title = $request->get('title');
		$payment->description = $request->get('description');
		$payment->method = $request->get('method');
		$payment->amount = $request->get('total_amount');
		$payment->payment_type = 'income';
		$payment->student_id = $request->get('student_id');
		$payment->invoice_id = Invoice::all()->last()->id;
		$payment->save();
		return back();
		$success = "Payment is added";
		return back()->with('success',$success);
	}
	public function update_payment(Request $request)
	{
		if(!Auth::user()->permission('add_payment'))
			return redirect('dashboard');
		$validator = Validator::make($request->all(), [
            'title' => array('Regex:/^[A-Za-z0-9 ]+$/'),
            'amount' => array('Regex:/^[A-Za-z0-9 ]+$/'),
            'description' => array('Regex:/^[A-Za-z0-9 ]+$/'),
   		]);
   		if ($validator->fails()) {
   			return back();
   		}
		$invoice_id = $request->get('invoice_id');
		$payment_id = $request->get('payment_id');
		$invoice = Invoice::find($invoice_id);
		$invoice->title = $request->get('title');
		$invoice->description = $request->get('description');
		$invoice->amount = $request->get('total_amount');
		$invoice->amount_paid = $request->get('amount');
		$invoice->student_id = $request->get('student_id');
		$invoice->payment_method = $request->get('method');
		$invoice->status = $request->get('status');
		$invoice->date = $request->get('date');
		$invoice->save();
		$payment = Payment::find($payment_id);
		$payment->title = $request->get('title');
		$payment->description = $request->get('description');
		$payment->method = $request->get('method');
		$payment->amount = $request->get('total_amount');
		$payment->payment_type = 'income';
		$payment->student_id = $request->get('student_id');
		$payment->invoice_id = $invoice_id;
		$payment->save();
		return back();
		$success = "Payment is updated";
		return back()->with('success',$success);
	}
	public function destroy_payment(Request $request, $id)
	{
		$post = Payment::find($id);
		if($post){
			$post->delete();
		}
		$success = "Payment is deleted";
		return back()->with('success',$success);
	}
	public function manage_mark($exam='',$class='',$subject='')
	{
		if(!Auth::user()->permission('view_marks'))
			return redirect('dashboard');
		$classes = Classes::get_classes();
		$exams = Exam::all();
		$subjects = Subject::all();
		$examm = $exam;
		$class_id = $class;
		$subject = $subject;
		$class_id = $class_id;
		$students = User::where('role', 'student')->where('class_id', $class_id)->get();
		$getmark = Mark::where('subject_id', $subject)->where('exam_id',$examm)->orderBy('created_at','desc')->paginate();
		return view('admin.exam.mark')->with(compact(['classes','examm','subject','class_id','students','exams','subjects','getmark']));
	}
	public function select_mark(Request $request)
	{	
		if(!Auth::user()->permission('view_marks'))
			return redirect('dashboard');
		$exam = $request->get('exam');
		$class = $request->get('class');
		$subject = $request->get('subject');
		if($exam && $class && $subject != "void"){
			return redirect('manage_mark/'.$exam.'/'.$class.'/'.$subject);
		}
		else {
			
		 return back();
		}
	}
	public function store_mark(Request $request)
	{
		if(!Auth::user()->permission('add_mark'))
			return redirect('dashboard');
		   
		foreach($request->get('student_id') as $key => $eachStudent){
			$subject = $request->get('subject_id');
			$student = $eachStudent;
			$mark = $request->get('mark_obtained')[$key];
			$comment = $request->get('comment')[$key];
			$exam = $request->get('exam_id');
			$getmark = Mark::where('subject_id', $subject)->where('student_id', $student)->where('exam_id', $request->get('exam_id'))->first();
			if(is_null($getmark)){
				$mark = new Mark();
				$mark->subject_id = $subject;
				$mark->class_id = $request->get('class_id');
				$mark->exam_id = $exam;
				$mark->mark_total = 100;
				$mark->comment = $comment;
				$mark->student_id = $student;
				$mark->mark_obtained = $request->get('mark_obtained')[$key];
				$mark->save();
			}
			else{
				Mark::where('student_id',$student)->where('subject_id', $subject)->where('exam_id', $exam)->
				update(['mark_obtained' => $request->get('mark_obtained')[$key],'comment' => $comment]);
				
			}
		}
		$success = "Data is added";
		return back()->with('success',$success);
	}
	public function mark_sheet_show($title)
	{
		if(!Auth::user()->permission('view_marks'))
			return redirect('dashboard');
		$classes = Classes::where('slug',$title)->first();
		$exams = Exam::all();
		$marks = Mark::all();
		$subjects = Subject::all();

		if($classes)
		{
			if($classes->active == false)
				return redirect('/')->withErrors('requested page not found');
			$students = $classes->students;	
		}
		else 
		{
			return redirect('/')->withErrors('requested page not found');
		}
		return view('admin.exam.showmark')->with(compact(['exams','students','classes','subjects','marks']));
	}
	public function attendance($date='',$month='',$year='',$class_id='')
	{
		if(!Auth::user()->permission('take_attendance'))
			return redirect('dashboard');
		$classes = Classes::get_classes();
		$att = Attendance::where('date',$date)->first();
		$date = $date;
		$month = $month;
		$year = $year;
		$class_id = $class_id;
		$students = User::where('role', 'student')->where('class_id', $class_id)->orderBy('created_at','desc')->paginate();

		return view('admin.class.attendance')->with(compact(['classes','date','month','year','class_id','students']));
	}

	public function select_attendance(Request $request)
	{	
		if(!Auth::user()->permission('take_attendance'))
			return redirect('dashboard');
		$date = $request->get('date');
		$month = $request->get('month');
		$year = $request->get('year');
		$class = $request->get('class_id');
		if($class){
		return redirect('attendance/'.$date.'/'.$month.'/'.$year.'/'.$class)->withDate($date);
		}
		else {
			
		 return back();
		}
	}
	public function store_attendance(Request $request)
	{	
		if(!Auth::user()->permission('take_attendance'))
			return redirect('dashboard');
		$cl_id = $request->get('class');
		$students = User::where('role', 'student')->where('class_id', $cl_id)->orderBy('created_at','desc')->paginate();
		$day = $request->get('day');
		$month = $request->get('month');
		$year = $request->get('year');
		$class = $request->get('class');
		$date = $request->get('date');
		$data = $request->get('status');
		foreach ($students->values() as $key => $value) {
			$mat = new Attendance;
		    $mat->date = $date;
		    $mat->student_id = $value->id;
		    $mat->status = $data[$key];
		    $mat->save();
		 }
		$success = "Attendance is updated";
		return back()->with('success',$success);
	}

	public function update_attendance(Request $request)
	{	
		if(!Auth::user()->permission('take_attendance'))
			return redirect('dashboard');
		$cl_id = $request->get('class');
		$students = User::where('role', 'student')->where('class_id', $cl_id)->orderBy('created_at','desc')->paginate();
		$day = $request->get('day');
		$month = $request->get('month');
		$year = $request->get('year');
		$class = $request->get('class');
		$date = $request->get('date');
		$data = $request->get('status');
		$stu = $request->get('stu');
		foreach ($students->values() as $key => $value) {
			$get = Attendance::where('student_id',$value->id)->where('date',$date)->get();
 			if($get && $get->count() > 0 ){
			Attendance::where('student_id',$value->id)->where('date', $date)->
				update(['status' => $data[$key]]);
			}
			elseif ($get)
			{
				$mat = new Attendance;
			    $mat->date = $date;
			    $mat->student_id = $value->id;
			    $mat->status = $data[$key];
			    $mat->save();
			}
        
 		}
		$success = "Attendance is updated";
		return back()->with('success',$success);
	}

	public function teacher_attendance($date='',$month='',$year='')
	{
		if(!Auth::user()->permission('is_admin'))
			return redirect('dashboard');
		$date = $date;
		$month = $month;
		$year = $year;
		$teacher = User::where('role', 'teacher')->orderBy('created_at','desc')->paginate();
		return view('admin.class.tattendance')->with(compact(['date','month','year','teacher']));
	}

	public function select_teacher_attendance(Request $request)
	{	
		if(!Auth::user()->permission('is_admin'))
			return redirect('dashboard');
		$date = $request->get('date');
		$month = $request->get('month');
		$year = $request->get('year');
		if($year){
			return redirect('teacher_attendance/'.$date.'/'.$month.'/'.$year)->withDate($date);
		}
		else {
			
		 return back();
		}
	}
	public function store_teacher_attendance(Request $request)
	{	
		if(!Auth::user()->permission('is_admin'))
			return redirect('dashboard');
		$teachers = User::where('role', 'teacher')->orderBy('created_at','desc')->paginate();
		$day = $request->get('day');
		$month = $request->get('month');
		$year = $request->get('year');
		$date = $request->get('date');
		$data = $request->get('status');
		foreach ($teachers->values() as $key => $value) {
			$mat = new TeacherAttendance;
		    $mat->date = $date;
		    $mat->teacher_id = $value->id;
		    $mat->status = $data[$key];
		    $mat->save();
        
		}
		$success = "Attendance is updated";
		return back()->with('success',$success);
	}

	public function update_teacher_attendance(Request $request)
	{	
		if(!Auth::user()->permission('is_admin'))
			return redirect('dashboard');
		$students = User::where('role', 'teacher')->orderBy('created_at','desc')->paginate();
		$day = $request->get('day');
		$month = $request->get('month');
		$year = $request->get('year');
		$date = $request->get('date');
		$data = $request->get('status');
		foreach ($students->values() as $key => $value) {
			$get = TeacherAttendance::where('teacher_id',$value->id)->where('date',$date)->get();
 			if($get && $get->count() > 0 ){
			TeacherAttendance::where('teacher_id',$value->id)->where('date', $date)->
			update(['status' => $data[$key]]);
			}
			elseif ($get)
			{
				$mat = new TeacherAttendance;
			    $mat->date = $date;
			    $mat->teacher_id = $value->id;
			    $mat->status = $data[$key];
			    $mat->save();
			}
        
 		}
		$success = "Attendance is updated";
		return back()->with('success',$success);
	}

	public function employee_attendance($date='',$month='',$year='')
	{
		if(!Auth::user()->permission('is_admin'))
			return redirect('dashboard');
		$date = $date;
		$month = $month;
		$year = $year;
		$employee = Employee::orderBy('created_at','desc')->paginate();
		return view('admin.class.empattendance')->with(compact(['date','month','year','employee']));
	}

	public function select_employee_attendance(Request $request)
	{	
		if(!Auth::user()->permission('is_admin'))
			return redirect('dashboard');
		$date = $request->get('date');
		$month = $request->get('month');
		$year = $request->get('year');
		if($year){
		return redirect('employee_attendance/'.$date.'/'.$month.'/'.$year)->withDate($date);
		}
		else {
			
		 return back();
		}
	}
	public function store_employee_attendance(Request $request)
	{	
		if(!Auth::user()->permission('is_admin'))
			return redirect('dashboard');
		$teachers = Employee::orderBy('created_at','desc')->paginate();
		$day = $request->get('day');
		$month = $request->get('month');
		$year = $request->get('year');
		$date = $request->get('date');
		$data = $request->get('status');
		foreach ($teachers->values() as $key => $value) {
			$mat = new EmployeeAttendance;
		    $mat->date = $date;
		    $mat->employee_id = $value->id;
		    $mat->status = $data[$key];
		    $mat->save();
        
 		}
		$success = "Attendance is updated";
		return back()->with('success',$success);
	}

	public function update_employee_attendance(Request $request)
	{	
		if(!Auth::user()->permission('is_admin'))
			return redirect('dashboard');
		$students = Employee::orderBy('created_at','desc')->paginate();
		$day = $request->get('day');
		$month = $request->get('month');
		$year = $request->get('year');
		$date = $request->get('date');
		$data = $request->get('status');
		foreach ($students->values() as $key => $value) {
			$get = EmployeeAttendance::where('employee_id',$value->id)->where('date',$date)->get();
 			if($get && $get->count() > 0 ){
			EmployeeAttendance::where('employee_id',$value->id)->where('date', $date)->
			update(['status' => $data[$key]]);
			}
			elseif ($get)
			{
				$mat = new EmployeeAttendance;
			    $mat->date = $date;
			    $mat->employee_id = $value->id;
			    $mat->status = $data[$key];
			    $mat->save();
			}
        
 		}
		$success = "Attendance is updated";
		return back()->with('success',$success);
	}

	public function sectionli($id)
	{
		$classes = Classes::where('id',$id)->first();
		if($classes)
		{
			$sections = Sections::where('class_id',$classes->id)->get();	
		}
		else 
		{
			return redirect('/')->withErrors('requested page not found');
		}
		return view('admin.class.sectionli')->with(compact(['sections']));
	}
	public function subjectli($id)
	{
		$classes = Classes::where('id',$id)->first();
		if($classes)
		{
			$subjects = $classes->subject;	
		}
		else 
		{
			return redirect('/')->withErrors('requested page not found');
		}
		return view('admin.class.subjectli')->with(compact(['subjects']));
	}
	public function show_routine()
	{	
		if(!Auth::user()->permission('add_routine'))
			return redirect('dashboard');
		$classes = Classes::get_classes();
		$classed = Classes::first();
		$cla = Classes::first();
		$routines = Routine::where('day_id', 1)->orderBy('created_at','desc')->get();
		$title = 'Latest Posts';
		$rts1 = $classed->class_id->where('day_id', 1);
		$auth = Auth::user();
		$settings = Settings::find(1);	
		$dab = $rts1->first();
		
		return view('admin.class.routine.class_routine')->with(compact(['routines','settings','classes','classed','auth','rts1','dab']));
	}
	// This will create routine
	public function create_routine(Request $request)
	{
		if(!Auth::user()->permission('add_routine'))
			return redirect('dashboard');
		$classes = Classes::get_classes();
		$posts = User::where('role', 'student')->orderBy('created_at','desc')->get();
		$subjects = Subject::orderBy('created_at','desc')->get();
		$days = Day::get();
		$auth = Auth::user();
		$settings = Settings::find(1);	
		return view('admin.class.routine.create_routine')->with(compact(['days','settings','classes','auth','subjects']));
	}
	// this will delete routine from table
	public function destroy_routine(Request $request, $id)
	{
		if(!Auth::user()->permission('add_routine'))
			return redirect('dashboard');
		$rout = Routine::find($id);
		$rout->delete();
		$success = "Data is deleted";
        return back()->with('success',$success);
	}

	// stores the routine
	public function store_routine(Request $request)
	{
		if(!Auth::user()->permission('add_routine'))
			return redirect('dashboard');
		$rout = new Routine();
		$rout->class_id = $request->get('class_id');
		$rout->subject_id = $request->get('subject_id');
		$mer1 = $request->get('mer1');
		$rout->starts = $request->get('starts')." $mer1";
		$mer2 = $request->get('mer2');
		$rout->ends = $request->get('ends')." $mer2";
		$rout->day_id = $request->get('day_id');
		$rout->active = 1;
		$rout->save();
		$success = "Data is added";
		return back()->with('success',$success);
	}

	public function edit_routine(Request $request,$id)
	{	
		if(!Auth::user()->permission('add_routine'))
			return redirect('dashboard');
		$classes = Classes::get_classes();
    	$posts = Posts::orderBy('created_at','desc')->get();
		$subjects = Subject::orderBy('created_at','desc')->get();
		$days = Day::get();
    	$auth = Auth::user();
		$rout = Routine::where('id',$id)->first();

		return view('admin.class.routine.edit')->with(compact(['posts','rout','classes','days','auth','subjects']));
	}

	public function update_routine(Request $request, $id)
	{
		if(!Auth::user()->permission('add_routine'))
			return redirect('dashboard');
        $post = Routine::find($id);
        $post->subject_id = $request->get('subject_id');
        $post->class_id = $request->get('class_id');
        $mer1 = $request->get('mer1');
        $post->starts = $request->get('starts')." $mer1";
        $mer2 = $request->get('mer2');
        $post->ends = $request->get('ends')." $mer2";
        $post->day_id = $request->get('day_id');
        $post->save();
        $success = "Data is updated";
		return back()->with('success',$success);
        
    }

	// shows the list of transport
	public function show_transport()
	{	
		$classes = Classes::get_classes();
		$transports = Transport::orderBy('created_at','desc')->get();
		$auth = Auth::user();
		$settings = Settings::find(1);
		return view('admin.transports.list')->with(compact(['transports','settings','classes','auth']));
	}
	public function store_transport(Request $request)
	{
		if(!Auth::user()->permission('add_transport'))
			return redirect('dashboard');
		$validator = Validator::make($request->all(), [
            'route_name' => array('Regex:/^[A-Za-z0-9 ]+$/'),
            'description' => array('Regex:/^[A-Za-z0-9 ]+$/'),
   		]);
   		if ($validator->fails()) {
   			return back();
   		}
		$post = new Transport();
		$post->route_fare = $request->get('route_fare');
		$post->route_name = $request->get('route_name');
		$post->number_of_vehicle = $request->get('no_of_vehicle');
		$post->description = $request->get('description');
		$post->save();
		$success = "Data is added";
		return back()->with('success',$success);
	}
	public function update_transport(Request $request)
	{
		if(!Auth::user()->permission('add_transport'))
			return redirect('dashboard');
		$validator = Validator::make($request->all(), [
            'route_name' => array('Regex:/^[A-Za-z0-9 ]+$/'),
            'description' => array('Regex:/^[A-Za-z0-9 ]+$/'),
   		]);
   		if ($validator->fails()) {
   			return back();
   		}
        $post = Transport::find($request->get('id'));
		$post->route_fare = $request->get('route_fare');
		$post->route_name = $request->get('route_name');
		$post->number_of_vehicle = $request->get('no_of_vehicle');
		$post->description = $request->get('description');
        $post->save();
        $success = "Data is updated";
		return back()->with('success',$success);
    }
	public function destroy_transport(Request $request, $id)
	{
		if(!Auth::user()->permission('add_transport'))
			return redirect('dashboard');
		$post = Transport::find($id);
		$post->delete();
		$success = "Data is deleted";
		return back()->with('success',$success);
	}
	// shows the list of library
	public function show_library()
	{	
		$classes = Classes::get_classes();
		$libraries = Library::orderBy('created_at','desc')->get();
		$title = 'Latest Posts';
		$auth = Auth::user();
		$cl = Classes::get_classes();
		$settings = Settings::find(1);
		return view('admin.libraries.list')->with(compact(['libraries','settings','classes','auth','cl']));
	}
	public function store_library(Request $request)
	{
		if(!Auth::user()->permission('add_library'))
			return redirect('dashboard');
		$validator = Validator::make($request->all(), [
            'book_name' => array('Regex:/^[A-Za-z0-9 ]+$/'),
            'description' => array('Regex:/^[A-Za-z0-9 ]+$/'),
            'price' => array('Regex:/^[A-Za-z0-9 ]+$/'),
   		]);
   		if ($validator->fails()) {
   			return back();
   		}
		$post = new Library();
		$post->author = $request->get('author');
		$post->book_name = $request->get('book_name');
		//$post->price = $request->get('price');
		$post->class = $request->get('class');
		$post->description = $request->get('description');
		$post->save();
		$success = "Data is added";
		return back()->with('success',$success);
	}
	public function update_library(Request $request)
	{
		if(!Auth::user()->permission('add_library'))
			return redirect('dashboard');
		$validator = Validator::make($request->all(), [
            'book_name' => array('Regex:/^[A-Za-z0-9 ]+$/'),
            'description' => array('Regex:/^[A-Za-z0-9 ]+$/'),
            'price' => array('Regex:/^[A-Za-z0-9 ]+$/'),
   		]);
   		if ($validator->fails()) {
   			return back();
   		}
        $post = Library::find($request->get('id'));
		$post->author = $request->get('author');
		$post->book_name = $request->get('book_name');
		//$post->price = $request->get('price');
		$post->class = $request->get('class');
		$post->description = $request->get('description');
        $post->save();
        $success = "Data is updated";
		return back()->with('success',$success);
        
    }
	public function destroy_library(Request $request, $id)
	{
		if(!Auth::user()->permission('add_library'))
			return redirect('dashboard');
		$post = Library::find($id);
		$post->delete();
		$success = "Data is deleted";
		return back()->with('success',$success);
	}
	public function system_backup()
	{	
		if(!Auth::user()->permission('is_admin'))
			return redirect('dashboard');
		$cl = Classes::get_classes();
		return view('admin.backup.list')->with(compact(['cl']));
	}
	// shows the list of notice
	public function show_noticeboard()
	{	
		$classes = Classes::get_classes();
		$notices = Notice::orderBy('created_at','desc')->get();
		$title = 'Latest Posts';
		$auth = Auth::user();
		$settings = Settings::find(1);
		return view('admin.noticeboard.list')->with(compact(['notices','settings','classes','auth']));
	}
	public function store_noticeboard(Request $request)
	{
		if(!Auth::user()->permission('add_notice'))
			return redirect('dashboard');
		$post = new Notice();
		$post->title = strip_tags($request->get('title')) ;
		$post->body = strip_tags($request->get('body'));
		$post->for = $request->get('for');
		$post->active = 1;
		$post->save();
		$success = "Data is added";
		return back()->with('success',$success);
	}
	public function update_noticeboard(Request $request)
	{
		if(!Auth::user()->permission('add_notice'))
			return redirect('dashboard');
		$validator = Validator::make($request->all(), [
            'title' => array('Regex:/^[A-Za-z0-9 ]+$/'),
            'body' => array('Regex:/^[A-Za-z0-9 ]+$/'),
            'price' => array('Regex:/^[A-Za-z0-9 ]+$/'),
   		]);
   		if ($validator->fails()) {
   			return back();
   		}
        $post = Notice::find($request->get('id'));
		$post->title = $request->get('title');
		$post->body = $request->get('body');
		$post->for = $request->get('for');
        $post->save();
        $success = "Data is updated";
		return back()->with('success',$success);
        
    }
	public function destroy_noticeboard(Request $request, $id)
	{
		if(!Auth::user()->permission('add_notice'))
			return redirect('dashboard');
		$post = Notice::find($id);
		$post->delete();
		$success = "Data is deleted";
		return back()->with('success',$success);
	}
	public function class_show($title)
	{
		if(!Auth::user()->permission('view_students'))
			return redirect('dashboard');
		$slug = $title;
		$class = Classes::where('slug',$title)->first();
		if($class){
			if(Auth::user()->admin_type == 'super'){
				$students = User::where('class_id',$class->id)->get();
			}
			else{
				$students = User::where('class_id',$class->id)->where('school_id', Auth::user()->school_id)->get();
			}
			return view('admin.class.showclass')->with(compact(['students','slug']));
		}
		else{
			$error = "Class not found";
			return redirect('dashboard')->with('error',$error);
		}
	}
	public function class_show_by_school($title, $school)
	{
		if(!Auth::user()->permission('view_students'))
			return redirect('dashboard');
		
		$slug = $title;
		$class = Classes::where('slug',$title)->first();
		if($class){
			if(Auth::user()->admin_type == 'super'){
				$students = User::where('class_id',$class->id)->where('school_id', $school)->get();
			}
			else{
				$students = User::where('class_id',$class->id)->where('school_id', $school)->get();
			}
			return view('admin.class.showclass')->with(compact(['students','slug']));
		}
		else{
			$error = "Class not found";
			return redirect('dashboard')->with('error',$error);
		}

	}
	public function update_classes_student(Request $request)
	{
		if(!Auth::user()->permission('add_student'))
			return redirect('dashboard');
		$student = User::find($request->get('student_id'));
		if($student){
			$student->email = $request->get('email');
			$student->name = $request->get('name');
			$student->address = $request->get('address');
			$student->phone = $request->get('phone');
			$student->parent_id = $request->get('parent_id');
			$student->school_id = $request->get('school');
			$file = $request->file('file');
			if($file){
				$extensions = ["jpg" , "jpeg", "png"];
				$isImage = $file->getClientOriginalExtension(); 
				if (in_array($isImage, $extensions)){
					$destinationPath = public_path().'/ev-assets/uploads/avatars';
					$extension = $file->getClientOriginalExtension(); // getting image extension
					$fileName = rand(11111,99999).$student->name.'.'.$extension; // renameing image
					$request->file('file')->move($destinationPath, $fileName);
					$student->image = $fileName; // upload path
				}
			}
			$student->save();
			$success = "Data is updated";
			return back()->with('success',$success);
		}
		else{
			$error = "Student not found";
			return redirect('dashboard')->with('error',$error);
		}
    }
	public function destroy_classes(Request $request, $id)
	{
		if(!Auth::user()->permission('add_student'))
			return redirect('dashboard');
		$user = User::find($id);
		$user->delete();
		$success = "Data is deleted";
		return back()->with('success',$success);
	}
	
	public function edit_classes(Request $request, $id) 
    {
		if(!Auth::user()->permission('add_class'))
			return redirect('dashboard');
        $admins = Classes::where('id',$id)->first();
        return view('admin.dormitory.edit')->with(compact(['admins']));

    }
    public function update_classes(Request $request)
	{
		if(!Auth::user()->permission('add_class'))
			return redirect('dashboard');
        $dormitory = Classes::find($request->get('id'));
		$dormitory->room_number = $request->get('room_no');
		$dormitory->name = $request->get('name');
		$dormitory->description = $request->get('desc');
        $dormitory->save();
        $success = "Data is updated";
		return back()->with('success',$success);
    }

	// display subjects for classes
	public function subject_show($title)
	{	
		if(!Auth::user()->permission('view_subjects'))
			return redirect('dashboard');
		$classes = Classes::get_classes();
		$showclasses = Classes::where('slug',$title)->first();
		$auth = Auth::user();
		$class = Classes::get_classes();
		$teacher = Auth::user()->admin_type == 'super' ? User::where('role', 'teacher')->orderBy('created_at','desc')->get() : User::where('role', 'teacher')->orderBy('created_at','desc')->where('school_id', Auth::user()->school_id)->get();
		$settings = Settings::find(1);

		if($showclasses)
		{
			if($showclasses->active == false)
				return redirect('/dashboard')->withErrors('requested page not found');
			$subjects = $showclasses->subject()->orderBy('created_at','asc')->get();	
		}
		else 
		{
			return redirect('/dashboard')->withErrors('requested page not found');
		}
		return view('admin.class.showsubject')->with(compact(['settings','subjects','showclasses','auth','classes','class','teacher']));
	}
	// store new subjects
	public function store_subject(Request $request)
	{
		if(Auth::user()->role != 'teacher' && Auth::user()->role != 'admin')
			return redirect('dashboard');
		$validator = Validator::make($request->all(), [
            'title' => array('Regex:/^[A-Za-z0-9 ]+$/'),
   		]);
   		if ($validator->fails()) {
   			return back();
   		}
		$post = new Subject();
		$post->title = $request->get('title');
		$post->class_id = $request->get('class_id');
		$gotten = $request->get('class_name');
		$post->teacher_id = $request->get('teacher_id');
		$post->active = 1;
		$post->save();
		$success = "Data is added";
		return back()->with('success',$success);
	}
	public function update_subject(Request $request)
	{
		if(!Auth::user()->permission('add_subject'))
			return redirect('dashboard');
		$validator = Validator::make($request->all(), [
            'title' => array('Regex:/^[A-Za-z0-9 ]+$/'),
   		]);
   		if ($validator->fails()) {
   			return back();
   		}
        $post = Subject::find($request->get('id'));
		$post->title = $request->get('title');
		$post->class_id = $request->get('class_id');
		$post->teacher_id = $request->get('teacher_id');
        $post->save();
        $success = "Data is updated";
		return back()->with('success',$success);
        
    }
	public function destroy_subject(Request $request, $id)
	{
		if(!Auth::user()->permission('add_subject'))
			return redirect('dashboard');
		$rout = Subject::find($id);
		$rout->delete();
		$success = "Data is deleted";
		return back()->with('success',$success);
	}
	public function create_bulk_student(Request $request)
	{	
		if(!Auth::user()->permission('add_student'))
			return redirect('dashboard');
		$settings = Settings::find(1);
		$auth = Auth::user();
		$classes = Classes::get_classes();
		$class = Classes::get_classes();
		$teacher = User::where('role', 'teacher')->orderBy('created_at','desc')->paginate();
		$message = trans('topbar_menu_lang.success');
		return view('admin.students.bulk')->with(compact(['teacher','settings','class','auth','message']));
	}
	//this will store bulk students at once
	public function store_bulk_student(Request $request)
	{	
		if(!Auth::user()->permission('add_student'))
			return redirect('dashboard');
		$file = $request->file('import_file');
		$extensions = ["csv" , "xls", "xlsx"];
		$isExcel = $file->getClientOriginalExtension(); 
		if (!in_array($isExcel, $extensions)){
			return back();
		}
		$class_id = $request->get('class_id');
		$teacher_id = $request->file('teacher_id');
		if($file){
			$path = $file->getRealPath();
			$data = Excel::load($path, function($reader) {
			})->get();
			if(!empty($data) && $data->count()){
				foreach ($data as $key => $value) {
					$the_id = User::all()->last()->id;
					$init = "EV".date('Y');
					$get_id = $the_id+1;
					if ($get_id<10) {
						$make_id = "000".$get_id;
					}
					elseif ($get_id>=10 && $get_id<100) {
						$make_id = "00".$get_id;
					}
					elseif ($get_id>=100 && $get_id<1000) {
						$make_id = "0".$get_id;
					}
					elseif ($get_id>=1000) {
						$make_id = "0".$get_id;
					}
					
					$detect = User::where('email',$value->email)->count();
					if ($detect != 0) {
						$new_email = $get_id.$value->email;
					}
					else{
						$new_email = $value->email;
					}
					$next_id = $init.$make_id;
					User::create([
						'reg_no' => $next_id,
						'name' => $value->name,
						'email' => $new_email,
						'password' => $value->password,
						'gender' => $value->gender,
						'birthday' => $value->birthday,
						'class_id' => $class_id,
						'section_id' => $value->section_id,
						'parent_id' => $value->parent_id,
						'dormitory_id' => $value->dormitory_id,
						'image' => $value->image,
						'role' => "student",
						'role_id' => 3
					]);
				}
				$success = "Data is added";
				return back()->with('success',$success);
			}
			else{
				$error = "No data is found in the file";
				return back()->with('error',$error);
			}
		}
		else{
			$error = "File not found";
			return back()->with('error',$error);
		}
	}

	public function create_student(Request $request)
	{	
		if(!Auth::user()->permission('add_student'))
			return redirect('dashboard');
		$next_id = "";
		$the_id = User::where('role', 'student')->get()->last() ? User::where('role', 'student')->get()->last()->id : 1;
		$init = "EV2018";
		$get_id = $the_id+1;
		if ($get_id<10) {
			$make_id = "000".$get_id;
		}
		elseif ($get_id>=10 && $get_id<100) {
			$make_id = "00".$get_id;
		}
		elseif ($get_id>=100 && $get_id<1000) {
			$make_id = "0".$get_id;
		}
		elseif ($get_id>=1000) {
			$make_id = "0".$get_id;
		}

		$next_id = $init.$make_id;

		$settings = Settings::find(1);
		$auth = Auth::user();
		$classes = Classes::get_classes();
		$sections = Sections::orderBy('created_at','desc')->get();
		$dormitories = Dormitory::orderBy('created_at','desc')->get();
		$parents = Auth::user()->admin_type == 'super' ? User::where('role', 'parent')->get() : User::where('role', 'parent')->where('school_id', Auth::user()->school_id)->get();

		return view('admin.students.create')->with(compact(['settings','classes',
				'auth','sections','dormitories','parents','the_id','next_id',]));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store_student(Request $request)
	{	
		if(!Auth::user()->permission('add_student'))
			return redirect('dashboard');
		$validator = Validator::make($request->all(), [
            'name' => array('Regex:/^[A-Za-z0-9 ]+$/'),
   		]);
   		if ($validator->fails()) {
   			return back();
   		}
		$post = new User();
		$post->name = $request->get('name');
		$name = str_slug($request->get('name'));
		$post->email = $request->get('email');
		$post->password = $request->get('password');
		$post->gender = $request->get('gender');
		$post->birthday = $request->get('birthday');
		$post->class_id = $request->get('class_id');
		$post->reg_no = $request->get('reg_no');
		//$post->section_id = $request->get('section_id');
		$post->parent_id = $request->get('parent_id');
		$post->school_id = $request->get('school');
		$file = $request->file('file');
		if($file){
			$extensions = ["jpg" , "jpeg", "png"];
			$isImage = $file->getClientOriginalExtension(); 
			if (in_array($isImage, $extensions)){
				$destinationPath = public_path().'/ev-assets/uploads/avatars';
				$extension = $file->getClientOriginalExtension(); // getting image extension
				$fileName = rand(11111,99999).$name.'.'.$extension; // renameing image
				$request->file('file')->move($destinationPath, $fileName);
				$post->image = $fileName; // upload path
			}
		}
      	$post->role = "student";
      	$post->role_id = 3;
		$post->active = 1;
		$duplicate = User::where('email',$request->get('email'))->first();
		if(!$duplicate){
			$post->save();
			$success = "Student is added";
			return back()->with('success',$success);
		}
		else{
			$success = "Student already exists";
			return back()->with('success',$success);
		}
	}
	public function create_teacher(Request $request)
	{
		if(!Auth::user()->permission('is_admin'))
			return redirect('dashboard');
		return view('admin.teacher.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store_teacher(Request $request)
	{
		$post = new User();
		$getname = str_replace('.', ' ', $request->get('name'));
		$post->name = $getname;
		$post->email = $request->get('email');
		$post->password = $request->get('password');
		$post->address = $request->get('address');
		$post->phone = $request->get('phone');
		$post->school_id = $request->get('school');
		$file = $request->file('file');
		if($file){
			$extensions = ["jpg" , "jpeg", "png"];
			$isImage = $file->getClientOriginalExtension(); 
			if (in_array($isImage, $extensions)){
				$destinationPath = public_path().'/ev-assets/uploads/avatars';
				$extension = $file->getClientOriginalExtension(); // getting image extension
				$fileName = rand(11111,99999).$post->name.'.'.$extension; // renameing image
				$request->file('file')->move($destinationPath, $fileName);
				$post->image = $fileName; // upload path
			}
		}
      	$post->role = "teacher";
      	$post->role_id = 4;
		$post->active = 1;
		$duplicate = User::where('email',$request->get('email'))->first();
		if(!$duplicate){
			$post->save();
			$success = "Teacher is added";
			return back()->with('success',$success);
		}
		else{
			$success = "Teacher already exists";
			return back()->with('success',$success);
		}
	}
	public function update_teacher(Request $request)
	{
		if(!Auth::user()->permission('is_admin'))
			return redirect('dashboard');
		$post = User::find($request->get('id'));
		if($post){
			$post->name = $request->get('name');
			$post->email = $request->get('email');
			$post->address = $request->get('address');
			$post->phone = $request->get('phone');
			$post->school_id = $request->get('school');
			$file = $request->file('file');
			if($file){
				$extensions = ["jpg" , "jpeg", "png"];
				$isImage = $file->getClientOriginalExtension(); 
				if (in_array($isImage, $extensions)){
					$destinationPath = public_path().'/ev-assets/uploads/avatars';
					$extension = $file->getClientOriginalExtension(); // getting image extension
					$fileName = rand(11111,99999).$post->name.'.'.$extension; // renameing image
					$request->file('file')->move($destinationPath, $fileName);
					$post->image = $fileName; // upload path
				}
			}
			$post->save();
			$success = "Data is updated";
			return back()->with('success',$success);
		}
		else{
			$error = "Teacher not found";
			return back()->with('error',$error);
		}
        
    }
	public function destroy_teachers(Request $request, $id)
	{
		if(!Auth::user()->permission('is_admin'))
			return redirect('dashboard');
		$rout = User::find($id);
		$rout->delete();
		
		$success = "Data is deleted";
        return back()->with('success',$success);
	}

	public function store_employee(Request $request)
	{
		if(!Auth::user()->permission('add_employee'))
			return redirect('dashboard');
		$post = new Employee();
		$getname = strip_tags(str_replace('.', ' ', $request->get('name')));
		$post->name = $getname;
		$post->email = strip_tags($request->get('email'));
		$post->address = strip_tags($request->get('address'));
		$post->phone = strip_tags($request->get('phone'));
      	$post->duty_post = strip_tags($request->get('duty'));
		$post->active = 1;
		
		$duplicate = Employee::where('email',$request->get('email'))->first();
		if(!$duplicate){
			$post->save();
			$success = "Employee is added";
			return back()->with('success',$success);
		}
		else{
			$error = "Employee already exists";
			return back()->with('error',$error);
		}
	}
	public function update_employee(Request $request)
	{
		if(!Auth::user()->permission('add_employee'))
			return redirect('dashboard');
        $post = Employee::find($request->get('id'));
		$post->name = $request->get('name');
		$post->email = $request->get('email');
		$post->address = $request->get('address');
		$post->phone = $request->get('phone');
        $post->save();
        $success = "Data is updated";
		return back()->with('success',$success);
        
    }
	public function destroy_employee(Request $request, $id)
	{
		if(!Auth::user()->permission('add_employee'))
			return redirect('dashboard');
		$rout = Employee::find($id);
		$rout->delete();
		$success = "Data is deleted";
        return back()->with('success',$success);
	}
	public function create_parent(Request $request)
	{ 
		if(Auth::user()->role != 'teacher' && Auth::user()->role != 'admin')
			return redirect('dashboard');
		return view('admin.parents.create');
	}

	public function store_parent(Request $request)
	{
		if(Auth::user()->role != 'teacher' && Auth::user()->role != 'admin')
			return redirect('dashboard');
		$post = new User();
		$post->name = strip_tags($request->get('name'));
		$post->email = strip_tags($request->get('email'));
		$post->password = strip_tags($request->get('password'));
		$post->phone = strip_tags($request->get('phone'));
		$post->address = strip_tags($request->get('address'));
		$post->school_id = $request->get('school');
		$file = $request->file('file');
		if($file){
			$extensions = ["jpg" , "jpeg", "png"];
			$isImage = $file->getClientOriginalExtension(); 
			if (in_array($isImage, $extensions)){
				$destinationPath = public_path().'/ev-assets/uploads/avatars';
				$extension = $file->getClientOriginalExtension(); // getting image extension
				$fileName = rand(11111,99999).$post->name.'.'.$extension; // renameing image
				$request->file('file')->move($destinationPath, $fileName);
				$post->image = $fileName; // upload path
			}
		}
      	$post->role = "parent";
      	$post->role_id = 2;
		$post->active = 1;
		$post->save();
		$success = "Parent is added";
		return redirect('parent_list')->with('success',$success);
	}
	public function create_bulk_parent(Request $request)
	{	
		if(!Auth::user()->permission('add_parent'))
			return redirect('dashboard');
		$settings = Settings::find(1);
		$auth = Auth::user();
		$classes = Classes::get_classes();
		$class = Classes::get_classes();
		$teacher = User::where('role', 'teacher')->orderBy('created_at','desc')->paginate();
		$message = trans('topbar_menu_lang.success');
		return view('admin.parents.bulk')->with(compact(['teacher','settings','class','auth','message']));
	}
	//this will store bulk students at once
	public function store_bulk_parent(Request $request)
	{	
		if(!Auth::user()->permission('add_parent'))
			return redirect('dashboard');
		$file = $request->file('import_file');
		if($file){
			$path = $file->getRealPath();
			$data = Excel::load($path, function($reader) {
			})->get();
			if(!empty($data) && $data->count()){
				foreach ($data as $key => $value) {
					$the_id = User::where('role', 'parent')->get()->last()->id;
					$get_id = $the_id+1;
					$detect = User::where('email',$value->email)->count();
					if ($detect != 0) {
						$new_email = $get_id.$value->email;
					}
					else{
						$new_email = $value->email;
					}
					$post = new User();
					$getname = str_replace('.', ' ', $value->name);
					$post->name = $getname;
					$post->email = $new_email;
					$post->password = $value->password;
					$post->address = $value->address;
					$post->phone = $value->phone;
			      	$post->image = $value->image;
			      	$post->role = 'parent';
			      	$post->role_id = 2;
			      	$post->save();
				}
				$success = "Data is added";
				return back()->with('success',$success);
			}
			else{
				$error = "No data in file";
				return back()->with('error',$error);
			}
		}
		else{
			$error = "No file is found";
			return back()->with('error',$error);
		}
	}

	public function update_parent_list(Request $request)
	{
		if(!Auth::user()->permission('add_parent'))
			return redirect('dashboard');
		$validator = Validator::make($request->all(), [
            'name' => array('Regex:/^[A-Za-z0-9 ]+$/'),
   		]);
   		if ($validator->fails()) {
   			return back();
   		}
		$parent = User::find($request->get('id'));
		if($parent){
			$parent->email = $request->get('email');
			$parent->name = $request->get('name');
			$parent->address = $request->get('address');
			$parent->school_id = $request->get('school');
			$parent->phone = $request->get('phone');
			$file = $request->file('file');
			if($file){
				$extensions = ["jpg" , "jpeg", "png"];
				$isImage = $file->getClientOriginalExtension(); 
				if (in_array($isImage, $extensions)){
					$destinationPath = public_path().'/ev-assets/uploads/avatars';
					$extension = $file->getClientOriginalExtension(); // getting image extension
					$fileName = rand(11111,99999).$parent->name.'.'.$extension; // renameing image
					$request->file('file')->move($destinationPath, $fileName);
					$parent->image = $fileName; // upload path
				}
			}
			$parent->save();
			$success = "Parent is updated";
			return back()->with('success',$success);
		}
		else{
			$error = "Parent not found";
			return back()->with('error',$error);
		}
        
    }
	public function destroy_parent(Request $request, $id)
	{
		if(!Auth::user()->permission('add_parent'))
			return redirect('dashboard');
		$post = User::find($id);
		$post->delete();
		$success = "Data is deleted";
		return back()->with('success',$success);
	}
	public function show_admin()
	{	
		if(!Auth::user()->permission('view_admin'))
			return redirect('dashboard');
		$posts = Auth::user()->admin_type == 'super' ? User::where('role', 'admin')->get() : User::where('role', 'admin')->where('school_id', Auth::user()->school_id)->get();
		return view('admin.admin.admin')->with(compact(['posts']));
	}

	
	public function store_admin(Request $request)
	{
		if(!Auth::user()->permission('add_admin'))
			return redirect('dashboard');
		$validator = Validator::make($request->all(), [
            'name' => array('Regex:/^[A-Za-z0-9 ]+$/'),
   		]);
   		if ($validator->fails()) {
   			return back();
   		}
		$post = new User();
		$getname = str_replace('.', ' ', $request->get('name'));
		$post->name = $getname;
		$post->email = $request->get('email');
		$post->school_id = $request->get('school');
		$post->admin_type = $request->get('admin_type');
		$post->password = $request->get('password');
		$post->role = 'admin';
		$post->role_id = 1;
		$file = $request->file('file');
		if ($file) {
			$extensions = ["jpg" , "jpeg", "png"];
			$isImage = $file->getClientOriginalExtension(); 
			if (in_array($isImage, $extensions)){
				$destinationPath = public_path().'/ev-assets/uploads/avatars';
				$extension = $file->getClientOriginalExtension(); // getting image extension
				$fileName = rand(11111,99999).$post->name.'.'.$extension; // renameing image
				$request->file('file')->move($destinationPath, $fileName);
				$post->image = $fileName; // upload path
			}
		}
		$post->role = "admin";
		$post->role_id = 1;
		$post->active = 1;
		$duplicate = User::where('email',$request->get('email'))->first();
		if(!$duplicate){
			$post->save();
			$success = "Admin is added";
			return back()->with('success',$success);
		}
		else{
			$error = "Admin already exists";
			return back()->with('error',$error);
		}
	}
	public function update_admin(Request $request)
	{
		if(!Auth::user()->permission('add_admin'))
			return redirect('dashboard');
		$validator = Validator::make($request->all(), [
            'name' => array('Regex:/^[A-Za-z0-9 ]+$/'),
   		]);
   		if ($validator->fails()) {
   			return back();
   		}
        $post = User::find($request->get('id'));
		$post->name = $request->get('name');
		$post->email = $request->get('email');
		$post->admin_type = $request->get('admin_type');
		$post->school_id = $request->get('school');
        $post->save();
        $success = "Data is updated";
		return back()->with('success',$success);
    }
	public function destroy_admin(Request $request, $id)
	{
		if(!Auth::user()->permission('add_admin'))
			return redirect('dashboard');
		$rout = User::find($id);
		$rout->delete();
		
		$success = "Data is delete";
        return back()->with('success',$success);
	}

	public function admin_profile(Request $request, $id) 
    {
        $admins = User::where('id',$id)->first();
        if (!$admins) {
        	return back();
        }
        return view('admin.profile')->withPost($admins);
    }
    public function edit_profile(Request $request, $id) 
    {
        $admins = User::where('id',$id)->first();

        return view('admin.edit')->withPost($admins);

    }
    public function update_profile(Request $request)
	{
		$validator = Validator::make($request->all(), [
            'name' => array('Regex:/^[A-Za-z0-9 ]+$/'),
   		]);
   		if ($validator->fails()) {
   			return back();
   		}
		$id = $request->input('id');
        $post = User::find($id);
        $post->name = $request->get('name');
        $post->email = $request->get('email');
		$post->save();
		$success = "Profile is updated";
		return back()->with('success',$success);
        
    }
    public function update_profile_pass(Request $request)
	{
		$id = $request->get('id');
		$ispass = $request->get('ispass');
		$curpass = $request->get('curpass');
		$npass = $request->get('npass');
		$rpass = $request->get('rpass');
        $post = User::find($id);
        if (($npass == $rpass)) {
        	$post->password = $npass;
        }
        if ($request->file('file')) {
			$file = $request->file('file');
			$extensions = ["jpg" , "jpeg", "png"];
			$isImage = $file->getClientOriginalExtension(); 
			if (in_array($isImage, $extensions)){
				$destinationPath = public_path().'/ev-assets/uploads/avatars';
				$extension = $request->file('file')->getClientOriginalExtension(); // getting image extension
				$fileName = rand(11111,99999).'.'.$extension; // renameing image
				$request->file('file')->move($destinationPath, $fileName);
				$post->image = $fileName; // upload path
			}
		}
        $message =  trans('topbar_menu_lang.success');
		$post->save();
		$success = "Profile is updated";
		return back()->with('success',$success);
        
    }

	public function create_class(Request $request)
	{ 
		if(!Auth::user()->permission('add_class'))
			return redirect('dashboard');
		return view('admin.class.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store_class(Request $request)
	{
		if(!Auth::user()->permission('add_class'))
			return redirect('dashboard');
		$validator = Validator::make($request->all(), [
       		'title' => 'required|unique:classes|max:255',
   		]);
   		if ($validator->fails()) {
   			return redirect('class/class_list');
   		}
		$post = new Classes();
		$post->title = $request->get('title');
		$post->teacher_id = $request->get('teacher_id');
		$post->school_id = $request->get('school');
		$post->slug = str_slug($request->get('title'));
		$post->active = 1;
		$post->save();
		$success = "Data is added";
		return back()->with('success',$success);
	}
	public function update_class_list(Request $request)
	{
		if(!Auth::user()->permission('is_admin'))
			return redirect('dashboard');
		$validator = Validator::make($request->all(), [
       		'title' => 'required|max:255',
   		]);
   		if ($validator->fails()) {
   			return redirect('class/class_list');
   		}
		$class = Classes::find($request->get('id'));
		if($class){
			$class->title = $request->get('title');
			$class->school_id = $request->get('school');
			$class->teacher_id = $request->get('teacher_id');
			$class->save();
			$success = "Data is updated";
			return back()->with('success',$success);
		}
		else{
			$error = "Class not found";
			return back()->with('error',$error);
		}
        
    }
	public function destroy_class(Request $request, $id)
	{
		if(!Auth::user()->permission('add_class'))
			return redirect('dashboard');
		$post = Classes::find($id);
		$post->delete();
		$success = "Data is deleted";
		return back()->with('success',$success);
	}
	public function create_gallery(Request $request)
	{
		if(!Auth::user()->permission('add_media'))
			return redirect('dashboard');
		return view('admin.gallery.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store_gallery(Request $request)
	{
		if(!Auth::user()->permission('add_media'))
			return redirect('dashboard');
		$validator = Validator::make($request->all(), [
            'title' => array('Regex:/^[A-Za-z0-9 ]+$/'),
   		]);
   		if ($validator->fails()) {
   			return redirect('class/class_list');
   		}
		$post = new Gallery();
		$post->title = $request->get('title');
		$post->comment = $request->get('comment');
		if ($request->file('file')) {
			$extension = $request->file('file')->getClientOriginalExtension(); // getting image extension
			if ($extension == 'png' || $extension == 'jpg' || $extension == 'gif') {
				$file = $request->file('file');
				if($file){
					$destinationPath = public_path().'/ev-assets/uploads/gallery/';
					$fileName = rand(11111,99999).'.'.$extension; // renameing image
					$request->file('file')->move($destinationPath, $fileName);
					$post->url = $fileName; // upload path
				}
				$post->save();
				$success = "Data is updated";
				return back()->with('success',$success);
			}
			else{
				$success = "Invalid file";
				return back()->with('success',$success);
			}
		}
		else{
			$error = "No file found";
			return back()->with('error',$error);
		}
	}
	public function school_settings(Request $request)
	{
		if(!Auth::user()->permission('is_admin'))
			return redirect('dashboard');
		$settings = Settings::find(1);
		$school = School::find(Auth::user()->school_id);
		$auth = Auth::user();
		$classes = Classes::get_classes();
		if($settings)
			return view('admin.settings.school_settings')->with(compact(['settings','school','classes','auth']));
		else 
		{
			return redirect('/')->withErrors('you have not sufficient permissions');
		}
	}
	public function update_school_settings(Request $request)
	{
		if(!Auth::user()->permission('is_admin'))
			return redirect('dashboard');
		$id = $request->input('id');
        $post = School::find($id);
        $post->name = $request->get('name');
        $post->email = $request->get('email');
        $post->phone = $request->get('phone');
        $post->address = $request->get('address');
        $post->color = $request->get('color');
        $file = $request->file('file');
        if($file){
			$extensions = ["jpg" , "jpeg", "png"];
			$isImage = $file->getClientOriginalExtension(); 
			if (in_array($isImage, $extensions)){
				$destinationPath = public_path().'/ev-assets/uploads/school-images';
				$extension = $file->getClientOriginalExtension(); // getting image extension
				$fileName = rand(11111,99999).'.'.$extension; // renameing image
				$request->file('file')->move($destinationPath, $fileName);
				$post->photo = $fileName; // upload path
			}
		}
		
        $stamp = $request->file('stamp');
        if($stamp){
			$extensions = ["jpg" , "jpeg", "png"];
			$isImage = $stamp->getClientOriginalExtension(); 
			if (in_array($isImage, $extensions)){
				$destinationPath = public_path().'/ev-assets/uploads/school-images';
				$extension = $stamp->getClientOriginalExtension(); // getting image extension
				$fileName = rand(11111,99999).'.'.$extension; // renameing image
				$request->file('stamp')->move($destinationPath, $fileName);
				$post->stamp = $fileName; // upload path
			}
        }
        $message =  trans('topbar_menu_lang.success');
        $post->save();
        $success = "Setting is updated";
		return back()->with('success',$success);
        
    }
	public function settings(Request $request)
	{
		if(!Auth::user()->permission('is_admin'))
			return redirect('dashboard');
		$settings = Settings::find(1);
		$auth = Auth::user();
		$classes = Classes::get_classes();
		if($settings)
			return view('admin.settings.settings')->with(compact(['settings','classes','auth']));
		else 
		{
			return redirect('/')->withErrors('you have not sufficient permissions');
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update_settings(Request $request)
	{
		if(!Auth::user()->permission('is_admin'))
			return redirect('dashboard');
		$id = $request->input('id');
        $post = Settings::find($id);
        $post->system_name = $request->get('system_name');
        $post->system_title = $request->get('system_title');
        $post->address = $request->get('address');
        $post->system_email = $request->get('system_email');
        $post->currency = $request->get('currency');
        $post->text_align = $request->get('text_align');
        $post->skin_color = $request->get('skin_color');
        $post->page = $request->get('page');
        $post->can_change = $request->get('can_change');
        $message =  trans('topbar_menu_lang.success');
		$post->save();
		$success = "Setting is updated";
		return back()->with('success',$success);
        
    }
    public function backup_settings(Request $request)
	{
		if(!Auth::user()->permission('is_admin'))
			return redirect('dashboard');
		$settings = Settings::find(1);
		$classes = Classes::get_classes();
		if($settings)
			return view('admin.settings.autobackupsettings')->with(compact(['settings','classes']));
		else 
		{
			return redirect('/')->withErrors('you have not sufficient permissions');
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update_backup_settings(Request $request)
	{

		if(!Auth::user()->permission('is_admin'))
			return redirect('dashboard');
		/*$id = $request->input('id');
        $post = Settings::find($id);
        $post->system_name = $request->get('system_name');
        $post->system_title = $request->get('system_title');
        $post->address = $request->get('address');
        $post->system_email = $request->get('system_email');
        $post->currency = $request->get('currency');
        $post->text_align = $request->get('text_align');
        $post->skin_color = $request->get('skin_color');
        $post->save();*/
        $success = "Data is updated";
		return back()->with('success',$success);
        
    }
    // export to excel file
    public function export_teacher($type)
	{	
		if(!Auth::user()->permission('is_admin'))
			return redirect('dashboard');
		$data = User::where('role','teacher')->get()->toArray();
		return Excel::create('eduvella', function($excel) use ($data) {
		$excel->sheet('mySheet', function($sheet) use ($data)
		{
			$sheet->fromArray($data);
		});
		})->download($type);
	}
	public function backup_now(Request $request)
	{	
		if(!Auth::user()->permission('is_admin'))
			return redirect('dashboard');
		$extension = $request->get('extension');
		$name = $request->get('name');
		if ($request->get('backup') == 'student') {
			$data = User::where('role','student')->get()->toArray();
			$destinationPath = public_path().'/ev-assets/uploads/backups/';
			$file = Excel::create('student_'.$name, function($excel) use ($data) {
			$excel->sheet('mySheet', function($sheet) use ($data)
			{
			$sheet->fromArray($data);
			});
			})->store($extension,$path = $destinationPath,$returninfo = true);
		}
		elseif ($request->get('backup') == 'teacher') {
			$data = User::where('role','teacher')->get()->toArray();
			$destinationPath = public_path().'/ev-assets/uploads/backups/';
			$file = Excel::create('teacher_'.$name, function($excel) use ($data) {
			$excel->sheet('mySheet', function($sheet) use ($data)
			{
			$sheet->fromArray($data);
			});
			})->store($extension,$path = $destinationPath,$returninfo = true);
		}
		elseif ($request->get('backup') == 'parent') {
			$data = User::where('role','parent')->get()->toArray();
			$destinationPath = public_path().'/ev-assets/uploads/backups/';
			$file = Excel::create('parent_'.$name, function($excel) use ($data) {
			$excel->sheet('mySheet', function($sheet) use ($data)
			{
			$sheet->fromArray($data);
			});
			})->store($extension,$path = $destinationPath,$returninfo = true);
		}
		elseif ($request->get('backup') == 'library') {
			$data = Library::get()->toArray();
			$destinationPath = public_path().'/ev-assets/uploads/backups/';
			$file = Excel::create('library_'.$name, function($excel) use ($data) {
			$excel->sheet('mySheet', function($sheet) use ($data)
			{
			$sheet->fromArray($data);
			});
			})->store($extension,$path = $destinationPath,$returninfo = true);
		}
		elseif ($request->get('backup') == 'classes') {
			$data = Classes::get()->toArray();
			$destinationPath = public_path().'/ev-assets/uploads/backups/';
			$file = Excel::create('classes_'.$name, function($excel) use ($data) {
			$excel->sheet('mySheet', function($sheet) use ($data)
			{
			$sheet->fromArray($data);
			});
			})->store($extension,$path = $destinationPath,$returninfo = true);
		}
			

		$success = "Data is backed up";
		return back()->with('success',$success);
		
	}
	public function data_import()
	{	
		if(!Auth::user()->permission('is_admin'))
			return redirect('dashboard');
		$cl = Classes::get_classes();
		return view('admin.backup.import')->with(compact(['cl']));
	}
	public function import_now(Request $request)
	{
		if(!Auth::user()->permission('is_admin'))
			return redirect('dashboard');
		$file = $request->file('import_file');
		$extensions = ["csv" , "xls", "xlsx"];
		$isExcel = $file->getClientOriginalExtension(); 
		if (!in_array($isExcel, $extensions)){
			return back();
		}
		$to = $request->get('import_to');
		if ($file) {
			$path = $file->getRealPath();
			$data = Excel::load($path, function($reader) {
			})->get();
			if ($to == 'teacher') {
				foreach ($data as $key => $value) {
					$post = new User();
					$getname = str_replace('.', ' ', $value->name);
					$post->name = $getname;
					$post->email = $value->email;
					$post->password = $value->password;
					$post->address = $value->address;
					$post->phone = $value->phone;
			      	$post->image = $value->image;
					$duplicate = User::where('role','teacher')->where('email',$value->email)->first();
					if(!$duplicate){
					$post->save();
					}
				}
			}
			elseif ($to == 'student') {
				foreach ($data as $key => $value) {
					$post = new User();
					$post->name = $value->name;
					$post->email = $value->email;
					$post->password = $value->password;
					$post->class_id = $value->class_id;
					$post->reg_no = $value->reg_no;
					$post->section_id = $value->section_id;
					$post->parent_id = $value->parent_id;
					$post->dormitory_id = $value->dormitory_id;
			      	$post->image = $value->image;
					$duplicate = User::where('role','student')->where('email',$value->email)->first();
					if(!$duplicate){
					$post->save();
					}
				}
			}
			elseif ($to == 'parent') {
				foreach ($data as $key => $value) {
					$post = new User();
					$post->name = $value->name;
					$post->email = $value->email;
					$post->password = $value->password;
					$post->phone = $value->phone;
					$post->address = $value->address;
			      	$post->image = $value->image;
			      	$duplicate = User::where('role','parent')->where('email',$value->email)->first();
					if(!$duplicate){
					$post->save();
					}
				}
			}
			elseif ($to == 'classes') {
				foreach ($data as $key => $value) {
					$post = new Classes();
					$post->title = $value->title;
					$post->teacher_id = $value->teacher_id;
					$post->slug = $value->slug;
					$post->active = $value->active;
			      	$duplicate = Classes::where('slug',$value->slug)->first();
					if(!$duplicate){
					$post->save();
					}
				}
			}
			elseif ($to == 'library') {
				foreach ($data as $key => $value) {
					$post = new Library();
					$post->author = $value->author;
					$post->book_name = $value->book_name;
					$post->price = $value->price;
					$post->class = $value->class;
					$post->description = $value->description;
					$message = 'Record Added successfully';
					$post->save();
				}
			}
		}
		$success = "Data is imported";
		return back()->with('success',$success);
		
	}
	public function task_manager()
	{			
		if(!Auth::user()->permission('is_admin'))
			return redirect('dashboard');
		return view('admin.task.task');
	}
	public function execute_taskmanager($action)
	{	
		if(!Auth::user()->permission('is_admin'))
			return redirect('dashboard');
		if ($action == 'view') {
			Artisan::call("view:clear");
			Artisan::call("clear-compiled");
			$message =  trans('topbar_menu_lang.success');
		}
		elseif ($action == 'config') {
			Artisan::call("config:clear");
			$message =  trans('topbar_menu_lang.success');
		}
		elseif ($action == 'cache') {
			Artisan::call("cache:clear");
			$message =  trans('topbar_menu_lang.success');
		}
		elseif ($action == 'restore') {
			Artisan::call("migrate:refresh");
			Artisan::call("db:seed");
			$message =  trans('topbar_menu_lang.success');
		}
		elseif ($action == 'passport') {
			Artisan::call('passport:install', [
				'--force' => true,
			]);
			$message =  trans('topbar_menu_lang.success');
		}
		elseif ($action == 'migrate') {
			Artisan::call('migrate');
			$message =  trans('topbar_menu_lang.success');
		}

		return back()->with('success',$message);
	}
	public function clear_view()
	{
		if(!Auth::user()->permission('is_admin'))
			return redirect('dashboard');
		Artisan::call("view:clear");
		return back();
	}
	//language area
	public function language(Request $request, $locale)
	{
		$file = fopen(realpath(base_path('config/lang.php')), 'w');
		fwrite($file, "<?php
							return[
								'locale' => '$locale'
							];");
		$success = "Language is changed";
		return back()->with('success',$success);
	}
}
