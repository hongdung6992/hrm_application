@php
$educations = isset($educations) ? $educations : [];
$departments = isset($departments) ? $departments : [];
$skill = $position = $certificate = $graduateSchool = '';
$education = $department = 0;
@endphp

@if (isset($worker))
@php
$skill = $worker->skill;
$education = $worker->education_id;
$department = $worker->department_id;
$position = $worker->position;
$certificate = $worker->certificate;
$graduateSchool = $worker->graduate_school;
@endphp
@endif

<div class="tab-pane" id="education">
  <div class="row">
    <div class="col-md-12">
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            {!! Form::label('education_id', t('worker.education')) !!}
            {!! Form::select('education_id', $educations, $education, ['class' => 'form-control']) !!}
          </div>
          <div class="form-group">
            {!! Form::label('graduate_school', t('worker.graduate_school')) !!}
            {!! Form::text('graduate_school', $graduateSchool, ['class' => 'form-control']) !!}
          </div>
          <div class="form-group">
            {!! Form::label('certificate', t('worker.certificate')) !!}
            {!! Form::text('certificate', $certificate, ['class' => 'form-control']) !!}
          </div>
          <div class="form-group">
            {!! Form::label('skill', t('worker.skill')) !!}
            {!! Form::text('skill', $skill, ['class' => 'form-control']) !!}
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            {!! Form::label('department_id', t('worker.department')) !!}
            {!! Form::select('department_id', $departments, $department, ['class' =>
            'form-control']) !!}
          </div>
          <div class="form-group">
            {!! Form::label('position', t('worker.position')) !!}
            {!! Form::text('position', $position, ['class' => 'form-control']) !!}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
