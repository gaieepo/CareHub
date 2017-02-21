@extends('protocols.protocolLayout')

@section('protocol_content')
<div class="container-fluid">
  <h3><strong>Chest Pain</strong></h3>
  <div class="guide-panel"><div data-wizard-init>
    <ul class="steps">
      <li data-step="1">Notes</li>
      <li data-step="2">Step A</li>
      <li data-step="3">Step B</li>
      <li data-step="4">Step C</li>
      <li data-step="5">Step D</li>
      <li data-step="6">Home Care</li>
    </ul>
    <div class="steps-content">
      <div data-step="1">
        <h4 class="important-color"><b>Key Questions to take note:</b></h4>
        <p>Description of pain, what was patient doing prior to chest pain, ciated symptoms, any medications taken, duration of pain, relieved by medication, pain s</p>
        <h4 class="attention-color"><b>Other Protocols to consider:</b></h4>
        <p>Breathing Problems, Common Cold Symptoms, Congestion, Congestive Heart Failure, Cough, Dizziness, Heartburn, Heart Rate Problems, Indigestion, Nausea/Vomiting</p>
      </div>
      <div data-step="2" class="container-fluid row">
        <assessment-panel class="col-xs-6">
          <h4><b>Assessment</b></h4><hr>
          <h4><b class="attention-color">Are any of the complaints present?</b></h4>
          <fieldset class="checkboxgroup">
            <ul>
              <li><label><input type="checkbox" id="ntul-parent">Continuous or intermittent pain tightness, pressure, or discomfort accompanied by the following:</label></li>
              <ul class="nested-ul">
                <li><label><input type="checkbox">shortness of breath</label></li>
                <li><label><input type="checkbox">dizziness or weakness</label></li>
                <li><label><input type="checkbox">diaphoresis</label></li>
                <li><label><input type="checkbox">nausea or vomiting</label></li>
                <li><label><input type="checkbox">pain radiated to jaw, neck, back, shoulder or arm</label></li>
                <li><label><input type="checkbox">fast heart rate</label></li>
              </ul>
              <li><label><input type="checkbox">Chest pain persists, unrelieved by rest, pain medication (eg, analgesia, antacid) or nitroglycerin every 5 minutes (number of doses taken, spray or sublingual)</label></li>
              <li><label><input type="checkbox">Anginal chest pain at rest (eg, pale, diaphoresis, SOB, near syncope)</label></li>
              <li><label><input type="checkbox">Pain not relieved by two nitroglycerin tablets</label></li>
              <li><label><input type="checkbox">Coughing up blood (moderate to large amount)</label></li>
              <li><label><input type="checkbox">Heart palpitations with dizziness or near syncope</label></li>
            </ul>
          </fieldset>
        </assessment-panel>
        <action-panel class="col-xs-6">
          <h4><b>Action Taken</b></h4><hr>
            <div class="action-content">
              <h4>IF <b class="important-color">YES</b>,</h4>
              <p>Instruct care giver or patient to <b class="important-color">ACTIVATE 995</b> Ambulance for help</p>
              <p>CareHub Team to activate 995 Ambulance on behalf if:</p>
              <ul>
                <li>Patient sounded in distress</li>
                <li>Drowsy</li>
                <li>Altered mental status</li>
              </ul>
              <p>Instruct patient to take one adult aspirin (if prescribed by doctor) or one sublingual GTN before ambulance arrives</p>
            </div>
        </action-panel>
      </div>
      <div data-step="3" class="container-fluid row">
        <assessment-panel class="col-xs-6">
          <h4><b>Assessment</b></h4><hr>
          <h4><b class="attention-color">Are any of the complaints present?</b></h4>
          <fieldset class="checkboxgroup">
            <ul>
              <li><label><input type="checkbox">Non anginal chest pain at rest</label></li>
              <li><label><input type="checkbox">Recent period of prolong sitting (such as travelling)</label></li>
              <li><label><input type="checkbox">Sudden onset of swollen ankle</label></li>
              <li><label><input type="checkbox">Pain, swelling, warmth or redness of leg</label></li>
              <li><label><input type="checkbox">Fever, cough, congestion and shortness of breath</label></li>
              <li><label><input type="checkbox">Trauma, child birth or surgery in past month</label></li>
              <li><label><input type="checkbox">History of blood clotting problems</label></li>
              <li><label><input type="checkbox">Heart palpitations with no associated symptoms</label></li>
            </ul>
          </fieldset>
        </assessment-panel>
        <action-panel class="col-xs-6">
          <h4><b>Action Taken</b></h4><hr>
            <div class="action-content">
              <h4>IF <b class="important-color">YES</b>,</h4>
              <ul>
                <li>Consult nearest GP immediately</li>
                <li>Check if medications are taken (if not taken yet)</li>
                <li>(take pain score of 1 to 10, 10 being severe and 1 being minor and 0 for no pain)</li>
                <li>If not better after medication and pain score still above 5</li>
                <li>Consider Escalation Protocol</li>
                <li>Consider early SOC appointment</li>
              </ul>
              <p>&#10033 Get earlier Cardiac Outpatient appointment or primary health care</p><br>
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
      <div data-step="4">
        <assessment-panel class="col-xs-6">
          <h4><b>Assessment</b></h4><hr>
          <h4><b class="attention-color">Are any of the complaints present?</b></h4>
          <fieldset class="checkboxgroup">
            <ul>
              <li><label><input type="checkbox">Localised area with painful blisters or rash</label></li>
              <li><label><input type="checkbox">Recent injury and pain increases with movement</label></li>
              <li><label><input type="checkbox">Chest pain with exertion that is relieved with rest (duration, recurrence)</label></li>
            </ul>
          </fieldset>
        </assessment-panel>
        <action-panel class="col-xs-6">
          <h4><b>Action Taken</b></h4><hr>
            <div class="action-content">
              <h4>IF <b class="important-color">YES</b>,</h4>
              <ul>
                <li>Consult nearest GP immediately</li>
                <li>Check if medications are taken (if not taken yet)</li>
                <li>If chest pain relieved by GTN and pain score is less than 4,</li>
                <li>Call back patient the next day to check on patient</li>
              </ul>
            </div>
        </action-panel>
      </div>
      <div data-step="5">
        <assessment-panel class="col-xs-6">
          <h4><b>Assessment</b></h4><hr>
          <h4><b class="attention-color">Are any of the complaints present?</b></h4>
          <fieldset class="checkboxgroup">
            <ul>
              <li><label><input type="checkbox">Pain occurs with deep breathing</label></li>
              <li><label><input type="checkbox">Pain occurs when pressure is applied to the area</label></li>
              <li><label><input type="checkbox">Intermittent mild chest discomfort with productive coughing</label></li>
            </ul>
          </fieldset>
        </assessment-panel>
        <action-panel class="col-xs-6">
          <h4><b>Action Taken</b></h4><hr>
            <div class="action-content">
              <h4>IF <b class="important-color">YES</b>,</h4>
              <ul>
                <li>Consult nearest GP or polyclinic</li>
                <li>Check if medications are taken (if not taken yet)</li>
              </ul>
            </div>
        </action-panel>
      </div>
      <div data-step="6">
        <h4><b class="attention-color">Home Care Instructions</b></h4><hr>
        <ul>
          <li>Consult with a General Practitioner or polyclinic when pain is relieved</li>
          <li>Avoid eating 2 to 3 hours before bedtime if heart burn or GERD</li>
          <li>Take your usual pain medication (aspirin, panadol, or NSAIDS). Avoid acetaminophen or panadol if liver disease is present.</li>
          <li>Take nitroglycerin as directed by Primary Doctor if pain is typical chest angina pain; if no relief after 3 to 5 minutes, take aspirin (if prescribed by doctor) and another nitroglycerin dose and have someone drive you to the Emergency Department or call 995 ambulance.</li>
        </ul>
      </div>
    </div>
  </div></div><!--/.guide-panel-->
</div><!--/.fluid-container-->

@stop
