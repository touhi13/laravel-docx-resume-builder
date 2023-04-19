<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Qualification;
use App\Models\Experience;
use App\Models\VisitingSchedule;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('doctor.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('doctor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|email|unique:doctors,email',
        //     'description' => 'required|string',
        //     'biography' => 'required|string',
        //     'subDomainPrefix' => 'required|string|unique:doctors,subDomainPrefix',
        //     'phoneNumber' => 'required|string|unique:doctors,phoneNumber',
        //     'achievement' => 'required|string',
        //     'bmDcNumber' => 'required|string|unique:doctors,bmDcNumber',
        //     'department' => 'required|string',
        //     'specialityDescription' => 'required|string',
        //     'facebookLink' => 'nullable|url',
        //     'LinkedInLink' => 'nullable|url',
        //     'youtubeLink' => 'nullable|url',
        //     'degree.*' => 'required|string|max:255',
        //     'instituteName.*' => 'required|string|max:255',
        //     'passingYear.*' => 'required|string|max:255',
        //     'jobDuration.*' => 'required|string|max:255',
        //     'jobPosition.*' => 'required|string|max:255',
        //     'orgName.*' => 'required|string|max:255',
        //     'jobResponsibilities.*' => 'required|string',
        //     'organizationName.*' => 'required|string|max:255',
        //     'orgPhone.*' => 'required|string|max:255',
        //     'orgEmail.*' => 'required|email',
        //     'orgAddress.*' => 'required|string',
        //     'division.*' => 'required|string|max:255',
        //     'district.*' => 'required|string|max:255',
        //     'area.*' => 'required|string|max:255',
        //     'position.*' => 'required|string|max:255',
        //     'visitingTimeFrom.*' => 'nullable|date_format:H:i',
        //     'visitingTimeTo.*' => 'nullable|date_format:H:i',
        //     'appointmentPhoneNumber.*' => 'required|string|max:255',
        // ]);

        // create the doctor record
        $doctor = Doctor::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'description' => $request->input('description'),
            'biography' => $request->input('biography'),
            'subDomainPrefix' => $request->input('subDomainPrefix'),
            'phoneNumber' => $request->input('phoneNumber'),
            'achievement' => $request->input('achievement'),
            'bmDcNumber' => $request->input('bmDcNumber'),
            'department' => $request->input('department'),
            'specialityDescription' => $request->input('specialityDescription'),
            'facebookLink' => $request->input('facebookLink'),
            'LinkedInLink' => $request->input('LinkedInLink'),
            'youtubeLink' => $request->input('youtubeLink'),
        ]);

        // create qualification records
        $degrees = $request->input('degree');
        $institutes = $request->input('instituteName');
        $passingYears = $request->input('passingYear');
        foreach ($degrees as $index => $degree) {
            Qualification::create([
                'doctor_id' => $doctor->id,
                'degree' => $degree,
                'instituteName' => $institutes[$index],
                'passingYear' => $passingYears[$index],
            ]);
        }

        // create experience records
        $jobDurations = $request->input('jobDuration');
        $jobPositions = $request->input('jobPosition');
        $orgNames = $request->input('orgName');
        $jobResponsibilities = $request->input('jobResponsibilities');
        foreach ($jobDurations as $index => $jobDuration) {
            Experience::create([
                'doctor_id' => $doctor->id,
                'jobDuration' => $jobDuration,
                'jobPosition' => $jobPositions[$index],
                'orgName' => $orgNames[$index],
                'jobResponsibilities' => $jobResponsibilities[$index],
            ]);
        }

        // create visiting schedule records
        $orgNames = $request->input('organizationName');
        $orgPhones = $request->input('orgPhone');
        $orgEmails = $request->input('orgEmail');
        $orgAddresses = $request->input('orgAddress');
        $divisions = $request->input('division');
        $districts = $request->input('district');
        $areas = $request->input('area');
        $positions = $request->input('position');
        $visitingDay = $request->input('visitingDay');
        $visitingTimeFroms = $request->input('visitingTimeFrom');
        $visitingTimeTos = $request->input('visitingTimeTo');
        $appointmentPhoneNumbers = $request->input('appointmentPhoneNumber');

        // dd( $visitingDay );
        foreach ($orgNames as $index => $orgName) {
            // dd(json_encode($visitingDay[$index]));
            VisitingSchedule::create([
                'doctor_id' => $doctor->id,
                'organizationName' => $orgName,
                'orgPhone' => $orgPhones[$index],
                'orgEmail' => $orgEmails[$index],
                'orgAddress' => $orgAddresses[$index],
                'division' => $divisions[$index],
                'district' => $districts[$index],
                'area' => $areas[$index],
                'position' => $positions[$index],
                'visitingDay' => json_encode($visitingDay[$index]),
                'visitingTimeFrom' => $visitingTimeFroms[$index],
                'visitingTimeTo' => $visitingTimeTos[$index],
                'appointmentPhoneNumber' => $appointmentPhoneNumbers[$index],
            ]);
        }
        // create a new PHPWord object
        $phpWord = new PhpWord();

        // add a section to the document
        $section = $phpWord->addSection();

        // add a heading for the Personal Details section
        $section->addText('Personal Details', ['bold' => true, 'size' => 14]);

        // create a table for the Personal Details section
        $table = $section->addTable(['alignment' => 'left', 'borderColor' => 'black', 'borderSize' => 1, 'cellMargin' => 50, 'valign' => 'center']);
        // $table->addRow();
        // $table->addCell(8000, ['gridSpan' => 2])->addText('Personal Details', ['bold' => true, 'size' => 14]);

        $table->addRow();
        $table->addCell(2000)->addText('Name:', ['bold' => true]);
        $table->addCell(6000)->addText($doctor->name);
        $table->addRow();
        $table->addCell(2000)->addText('Email:', ['bold' => true]);
        $table->addCell(6000)->addText($doctor->email);
        $table->addRow();
        $table->addCell(2000)->addText('Description:', ['bold' => true]);
        $table->addCell(6000)->addText($doctor->description);
        $table->addRow();
        $table->addCell(2000)->addText('Biography:', ['bold' => true]);
        $table->addCell(6000)->addText($doctor->biography);
        $table->addRow();
        $table->addCell(2000)->addText('Sub domain Prefix:', ['bold' => true]);
        $table->addCell(6000)->addText($doctor->subDomainPrefix);
        $table->addRow();
        $table->addCell(2000)->addText('Phone Number:', ['bold' => true]);
        $table->addCell(6000)->addText($doctor->phoneNumber);
        $table->addRow();
        $table->addCell(2000)->addText('Achievement:', ['bold' => true]);
        $table->addCell(6000)->addText($doctor->achievement);
        $table->addRow();
        $table->addCell(2000)->addText('BMDC No:', ['bold' => true]);
        $table->addCell(6000)->addText($doctor->bmDcNumber);

        $section->addText('');

        // add a heading for the Professional Speciality section
        $section->addText('Professional Speciality', ['bold' => true, 'size' => 14]);

        // create a table for the Professional Speciality section
        $table = $section->addTable(['alignment' => 'left', 'borderColor' => 'black', 'borderSize' => 1, 'cellMargin' => 50, 'valign' => 'center']);
        // $table->addRow();
        // $table->addCell(8000, ['gridSpan' => 2])->addText('Professional Speciality', ['bold' => true, 'size' => 14]);
        $table->addRow();
        $table->addCell(2000)->addText('Department:', ['bold' => true]);
        $table->addCell(6000)->addText($doctor->department);
        $table->addRow();
        $table->addCell(2000)->addText('Description:', ['bold' => true]);
        $table->addCell(6000)->addText($doctor->specialityDescription);

        $section->addText('');

        // add a heading for the Social Links section
        $section->addText('Social Links', ['bold' => true, 'size' => 14]);
        // create a table for the Social Links section
        $table = $section->addTable(['alignment' => 'left', 'borderColor' => 'black', 'borderSize' => 1, 'cellMargin' => 50, 'valign' => 'center']);
        // $table->addRow();
        // $table->addCell(8000, ['gridSpan' => 2])->addText('Social Links', ['bold' => true, 'size' => 14]);
        $table->addRow();
        $table->addCell(2000)->addText('Facebook:', ['bold' => true]);
        $table->addCell(6000)->addText($doctor->facebookLink);
        $table->addRow();
        $table->addCell(2000)->addText('LinkedIn:', ['bold' => true]);
        $table->addCell(6000)->addText($doctor->LinkedInLink);
        $table->addRow();
        $table->addCell(2000)->addText('Youtube:', ['bold' => true]);
        $table->addCell(6000)->addText($doctor->youtubeLink);


        $section->addText('');

        // add a heading for the Qualifications section
        $section->addText('Qualifications', ['bold' => true, 'size' => 14]);
        // create a table for the Qualifications section
        $table = $section->addTable(['alignment' => 'left', 'borderColor' => 'black', 'borderSize' => 1, 'cellMargin' => 50, 'valign' => 'center']);
        // $table->addRow();
        // $table->addCell(8000, ['gridSpan' => 3])->addText('Qualifications', ['bold' => true, 'size' => 14]);
        $table->addRow();
        $table->addCell(2000)->addText('Degree Name', ['bold' => true]);
        $table->addCell(4000)->addText('Institute Name', ['bold' => true]);
        $table->addCell(2000)->addText('Passing Year', ['bold' => true]);
        foreach ($doctor->qualifications as $qualification) {
            $table->addRow();
            $table->addCell(2000)->addText($qualification->degree);
            $table->addCell(4000)->addText($qualification->instituteName);
            $table->addCell(2000)->addText($qualification->passingYear);
        }

        $section->addText('');

        // add a heading for the Experiences section
        $section->addText('Experiences', ['bold' => true, 'size' => 14]);

        $table = $section->addTable(['alignment' => 'left', 'borderColor' => 'black', 'borderSize' => 1, 'cellMargin' => 50, 'valign' => 'center']);
        // $table->addRow();
        // $table->addCell(8000, ['gridSpan' => 4])->addText('Experiences', ['bold' => true, 'size' => 14]);
        $table->addRow();
        $table->addCell(2000)->addText('Organization Name', ['bold' => true]);
        $table->addCell(2000)->addText('Job Position', ['bold' => true]);
        $table->addCell(2000)->addText('Job Duration', ['bold' => true]);
        $table->addCell(2000)->addText('Job Responsibilities', ['bold' => true]);
        foreach ($doctor->experiences as $experience) {
            $table->addRow();
            $table->addCell(2000)->addText($experience->orgName);
            $table->addCell(2000)->addText($experience->jobPosition);
            $table->addCell(2000)->addText($experience->jobDuration);
            $table->addCell(2000)->addText($experience->jobResponsibilities);
        }

        $section->addText('');

        // add a heading for the Visiting Schedules section
        $section->addText('Visiting Schedules', ['bold' => true, 'size' => 14]);
        // add the doctor's visiting schedules to the document
        $table = $section->addTable(['alignment' => 'left', 'borderColor' => 'black', 'borderSize' => 1, 'cellMargin' => 50, 'valign' => 'center']);
        // $table->addRow();
        // $table->addCell(8000, ['gridSpan' => 2])->addText('Visiting Schedules', ['bold' => true, 'size' => 14]);
        foreach ($doctor->visitingSchedules as $visitingSchedule) {
            $table = $section->addTable(['alignment' => 'left', 'borderColor' => 'black', 'borderSize' => 1, 'cellMargin' => 50, 'valign' => 'center']);
            $table->addRow();
            $table->addCell(3000)->addText('Organization Name', ['bold' => true]);
            $table->addCell(5000)->addText($visitingSchedule->organizationName);
            $table->addRow();
            $table->addCell(3000)->addText('Phone Number', ['bold' => true]);
            $table->addCell(5000)->addText($visitingSchedule->orgPhone);
            $table->addRow();
            $table->addCell(3000)->addText('Email', ['bold' => true]);
            $table->addCell(5000)->addText($visitingSchedule->orgEmail);
            $table->addRow();
            $table->addCell(3000)->addText('Address', ['bold' => true]);
            $table->addCell(5000)->addText($visitingSchedule->orgAddress);
            $table->addRow();
            $table->addCell(3000)->addText('Division', ['bold' => true]);
            $table->addCell(5000)->addText($visitingSchedule->division);
            $table->addRow();
            $table->addCell(3000)->addText('District', ['bold' => true]);
            $table->addCell(5000)->addText($visitingSchedule->district);
            $table->addRow();
            $table->addCell(3000)->addText('Area', ['bold' => true]);
            $table->addCell(5000)->addText($visitingSchedule->area);
            $table->addRow();
            $table->addCell(3000)->addText('Position', ['bold' => true]);
            $table->addCell(5000)->addText($visitingSchedule->position);
            $table->addRow();
            $table->addCell(3000)->addText('Visiting Day', ['bold' => true]);
            $table->addCell(5000)->addText(implode(', ', json_decode($visitingSchedule->visitingDay)));
            $table->addRow();
            $table->addCell(3000)->addText('Visiting Hours', ['bold' => true]);
            $table->addCell(5000)->addText($visitingSchedule->visitingTimeFrom . ' - ' . $visitingSchedule->visitingTimeTo);
            $table->addRow();
            $table->addCell(3000)->addText('Dr. Appointment Number', ['bold' => true]);
            $table->addCell(5000)->addText($visitingSchedule->appointmentPhoneNumber);
        }
        // create a writer object
        $writer = IOFactory::createWriter($phpWord, 'Word2007');

        // save the document in the public directory
        $filename = 'doctor_info_' . time() . '.docx';
        $filePath = public_path('assets/word_files/' . $filename);

        // save the document in the public directory
        $writer->save($filePath);
        dd($writer);
        // redirect to the doctor's profile page
        return redirect()->route('doctors.show', $doctor->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doctor $doctor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        //
    }
}
