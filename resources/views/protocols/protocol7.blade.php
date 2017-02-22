@extends('protocols.protocolLayout')

@section('protocol_content')
<div class="container-fluid">
  <h3><strong>Heart Rate Problems</strong></h3>
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
        <p>Description of the sensation of the heart rate, what was patient doing prior to having the palpitation problem (activities), associated symptoms, any medications taken, duration of the sensation, any relieved by medicatio</p>
        <h4 class="attention-color"><b>Other Protocols to consider:</b></h4>
        <p>Congestive Heart Failure, Chest Pain, Dizziness, Breathing Problem</p>
      </div>
      <div data-step="2" class="container-fluid row">
        <assessment-panel class="col-xs-6">
          <h4><b>Assessment</b></h4><hr>
          <h4><b class="attention-color">Are any of the complaints present?</b></h4>
          <fieldset class="checkboxgroup">
            <ul>
              <li><label><input type="checkbox">Is the heart rate > 150 beats per minute (if there is a blood pressure set with pulse rate where patient can read or patient is able to calculate from the palpation of radial pulse based on one minute) </label></li>
              <li><label><input type="checkbox">Persistent rapid heart rate of >150 beats per minute for >30minutes with increase fatigue</label></li>
              <li><label><input type="checkbox">Chest, neck, jaw or arm pain or  discomfort</label></li>
              <li><label><input type="checkbox">Difficulty in breathing</label></li>
              <li><label><input type="checkbox">Skin cool and moist or hot and dry</label></li>
              <li><label><input type="checkbox">Face and lips blue, or very pale</label></li>
              <li><label><input type="checkbox">Altered mental status / Fainting</label></li>
              <li><label><input type="checkbox">Repeated shocks with internal defibrillator in place (if AICD in place)</label></li>
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
              <p>Ensure patient GCS is 15 and alert</p>
            </div>
        </action-panel>
      </div>
      <div data-step="3" class="container-fluid row">
        <assessment-panel class="col-xs-6">
          <h4><b>Assessment</b></h4><hr>
          <h4><b class="attention-color">Are any of the complaints present?</b></h4>
          <fieldset class="checkboxgroup">
            <ul>
              <li><label><input type="checkbox">Persistent rapid heart rate of >150 beats per minute for >30minutes but not increasing fatigue</label></li>
              <li><label><input type="checkbox">Light- headedness, faintness or dizziness</label></li>
              <li><label><input type="checkbox">Persistent rapid heart rate and history of thyroid disease or heart disease</label></li>
              <li><label><input type="checkbox">Slow heart rate and extremely fatigue or frequent episodes of slow heart beat (<50 beats per minutes)</label></li>
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
                <li>Ask patient to sit down. If patient knows the vasovagal stimulation method (<b class="important-color">CAUTION! Only for Supraventricular Tachycardia. If patient is taught by physicians or nurses and ONLY has done it before! </b>), instruct patient to do so, if not, seek medical attention by going to the nearest GP </li>
                <li>Check if patient is taking beta blockers or other cardiac medications. Is patient becoming more lethargic and restless (please proceed back to <b class="important-color">A</b>for <b class="important-color">immediate attention</b>)</li>
                <li>Consider Escalation Protocol</li>
                <li>Consider bringing forward TCU appointment</li>
              </ul>
              <p>Instruct care giver or patient to <b class="important-color">ACTIVATE 995</b> Ambulance for help or proceed to seek help at the hospital (“Do not drive alone”)</p>
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
              <li><label><input type="checkbox">Frequent episodes of a rapid heart rate</label></li>
              <li><label><input type="checkbox">History of prior treatment for rapid heart rate</label></li>
              <li><label><input type="checkbox">Recent ingestion of diuretics, diet pills, decongestants, cold remedies, Beta blockers, thyroid medication, a new medication</label></li>
              <li><label><input type="checkbox">History of bronchodilator use and new prescriptions or increase in dose</label></li>
              <li><label><input type="checkbox">Excessive caffeine, tobacco, alcohol, TCM or herbals used</label></li>
              <li><label><input type="checkbox">Difficulty sleeping or persistent fatigue </label></li>
              <li><label><input type="checkbox">Increase in stress</label></li>
              <li><label><input type="checkbox">Exercise < 30 minutes before the onset of symptoms</label></li>
              <li><label><input type="checkbox">Unexplained weight gain, fatigue and feeling cold</label></li>
              <li><label><input type="checkbox">Fever (Temperature >37.5°C)</label></li>
            </ul>
          </fieldset>
        </assessment-panel>
        <action-panel class="col-xs-6">
          <h4><b>Action Taken</b></h4><hr>
            <div class="action-content">
              <h4>IF <b class="important-color">YES</b>,</h4>
              <ul>
                <li>Consult nearest GP within 24 hours or nearest Primary Health Care</li>
                <li>Check if medications are taken (if not taken yet)</li>
              </ul>
            </div>
        </action-panel>
      </div>
      <div data-step="5">
        <h4><b class="attention-color">Home Care Instructions</b></h4><hr>
        <ul>
          <li>Vasovagal method only if patient is trained or taught by physician or nurses
          <b class="important-color">(Caution! Method is only for Supraventricular Tachycardia)</b></li>
          <li>Take deep breaths; hold and pinch nostril closed. Gently try to exhale through the nose; take deep breath and bear down as if trying to pass motion (hold for a few seconds and exhale) Patient will feel light headedness. Do not attempt again if feeling fainting spell/nausea or vomiting</li>
          <li>Take cold shower and let the cold water splash on the face and head</li>
          <li>Try to rest and relax</li>
          <li>Avoid caffeine and alcohol</li>
        </ul>
      </div>
    </div>
  </div></div><!--/.guide-panel-->
</div><!--/.fluid-container-->

@stop
