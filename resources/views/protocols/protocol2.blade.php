@extends('protocols.protocolLayout')

@section('protocol_content')

<div class="container-fluid">
  <h3><strong>Congestive Heart Failure</strong></h3>
  <div class="guide-panel"><div data-wizard-init>
    <ul class="steps">
      <li data-step="1">Notes</li>
      <li data-step="2">Step A</li>
      <li data-step="3">Step B</li>
      <li data-step="4">Step C</li>
      <li data-step="5">Home Care</li>
    </ul>
    <div class="steps-content">
      <div data-step="1">
        <h4 class="important-color"><b>Key Questions to take note:</b></h4>
        <p>Description of shortness of breath (SOB), what was patient dpoing prior to SOB, associated symptoms, any medications taken, when did it occur, relieved by medication or rest</p>
        <h4 class="attention-color"><b>Other Protocols to consider:</b></h4>
        <p>Breathing Problems. Chest Pain, Cough, Dizziness, Weakness, Wheezing</p>
      </div>
      <div data-step="2" class="container-fluid row">
        <assessment-panel class="col-xs-6">
          <h4><b>Assessment</b></h4><hr>
          <h4><b class="attention-color">Are any of the complaints present?</b></h4>
          <fieldset class="checkboxgroup">
            <ul>
              
              <li><label><input type="checkbox">Sudden onset of SOB</label></li>
              <li><label><input type="checkbox">Chest pain or pressure</label></li>
              <li><label><input type="checkbox">Altered mental status</label></li>
              <li><label><input type="checkbox">Dusky or blue lips, tongue or fingernail beds</label></li>
              <li><label><input type="checkbox">Unable to speak more than 2 to 3 word sentences due to SOB</label></li>
              <li><label><input type="checkbox">Extreme exhaustion</label></li>
              <li><label><input type="checkbox">Feeling of suffocation</label></li>
              <li><label><input type="checkbox">Chest pain persists, unrelieved by rest, pain medication (eg, analgesia, antacid) or nitroglycerin (number of doses taken, spray or sublingual, duration taken)</label></li>
            </ul>
          </fieldset>
        </assessment-panel>
        <action-panel class="col-xs-6">
          <h4><b>Action Taken</b></h4><hr>
            <div class="action-content">
              <p>If patient is too breathless, obtain history from care giver as much as possible</p>
              <h4>IF <b class="important-color">YES</b>,</h4>
              <p>Instruct care giver or patient to <b class="important-color">ACTIVATE 995</b> Ambulance for help</p>
              <p>CareHub Team to activate 995 Ambulance on behalf if:</p>
              <ul>
                <li>Patient sounded in distress</li>
                <li>Drowsy</li>
                <li>Altered mental status</li>
              </ul>
              
            </div>
        </action-panel>
      </div>
      <div data-step="3" class="container-fluid row">
        <assessment-panel class="col-xs-6">
          <h4><b>Assessment</b></h4><hr>
          <h4><b class="attention-color">Are any of the complaints present?</b></h4>
          <fieldset class="checkboxgroup">
            <ul>
              <li><label><input type="checkbox">Sweating</label></li>
              <li><label><input type="checkbox">Increase anxiety</label></li>
              <li><label><input type="checkbox">Gradual increase in shortness of breath when lying flat or with activity</label></li>
              <li><label><input type="checkbox">Shortness of breath with exertion</label></li>
              <li><label><input type="checkbox">Speaking in partial sentences</label></li>
              <li><label><input type="checkbox">Upper respiratory infection with fever and cough</label></li>
              <li><label><input type="checkbox">Sudden weight gain >1kg per day for 3 days</label></li>
              <li><label><input type="checkbox">Sudden increased in swelling in legs, feet, or abdomen</label></li>
              <li><label><input type="checkbox">Persistent night cough</label></li> 
            </ul>
          </fieldset>
        </assessment-panel>
        <action-panel class="col-xs-6">
          <h4><b>Action Taken</b></h4><hr>
            <div class="action-content">
              <h4>IF <b class="important-color">YES</b>,</h4>
              <ul>
                <li>Consult nearest GP immediately</li>
                <li>Check if medications are taken (any antidiuretics taken and dosage), <p>&#10033 advice according to protocol</p></li>
                <li>Consider Escalation protocol</li>
                <li>Get earlier Cardiac Outpatient appointment if SOB is not severe</li>
              </ul>
              <p>&#10033 Get earlier Cardiac Outpatient appointment or primary health care</p><br>
            </div>
        </action-panel>
      </div>

      <div data-step="4">
        <assessment-panel class="col-xs-6">
          <h4><b>Assessment</b></h4><hr>
          <h4><b class="attention-color">Are any of the complaints present?</b></h4>
          <fieldset class="checkboxgroup">
            <ul>
              <li><label><input type="checkbox">Difficulty sleeping</label></li>
              <li><label><input type="checkbox">Increased ankle swelling</label></li>
              <li><label><input type="checkbox">Increasing fatigue or weakness</label></li>
              <li><label><input type="checkbox">Weight gain &gt; 1kg for a few days</label></li>
              <li><label><input type="checkbox">Increased wheezing</label></li>
            </ul>
          </fieldset>
        </assessment-panel>
        <action-panel class="col-xs-6">
          <h4><b>Action Taken</b></h4><hr>
            <div class="action-content">
              <h4>IF <b class="important-color">YES</b>,</h4>
              <ul>
                <li>Consult nearest GP with 24 hours</li>
                <li>Check if medications are taken (any antidiuretics taken and dosage), <p>&#10033 advice according to protocol</p></li>
                <li>If patient is weighing themselves, keep a record and take it to the next appointment</li>
                <li>Follow low-salt diet or fluid intake (generally within 1.5L per day)</li>
                <li>Avoid alcohol and smoking</li>
                <li>Follow the Heart Failure Action Plan</li>
                <div>
      <a class="example-image-link" href="{{ URL::asset('images/heart_failure_action_plan.jpg') }}" data-lightbox="example-1"><img class="example-image" src="{{ URL::asset('images/heart_failure_action_plan.jpg') }}" style="width: 50%" alt="image-1" /></a>
      </div>
              </ul>
            </div>
        </action-panel>

      </div>
      
      <div data-step="5">
        <h4><b class="attention-color">Home Care Instructions</b></h4><hr>
        <ul>
          <li>Take medications as prescribed</li>
          <li>Keep appointments with Cardiac SOC or GP or laboratory testing</li>
          <li>Daily weight before breakfast (at the same time each day) after emptying the bladder. Wear same amount of clothing each time and record it daily. Use the same weighing scale.</li>
          <li>Follow low salt diet as instructed by health care provider</li>
          <li>Pace activities. Slow down if activity causes increased difficulty in breathing</li>
          <li>Avoid alcohol and smoking</li>
        </ul>
      </div>
    </div>
  </div></div><!--/.guide-panel-->
</div><!--/.fluid-container-->

@stop
