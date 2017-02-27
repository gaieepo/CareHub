@extends('protocols.protocolLayout')

@section('protocol_content')
<div class="container-fluid">
  <h3><strong>Dizziness</strong></h3>
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
        <p>Description of dizziness (vertigo or non-vertigo), what was patient doing prior to the dizziness, associated symptoms, any medications taken, duration of the condition, symptoms relieved by medication</p>
        <h4 class="attention-color"><b>Other Protocols to consider:</b></h4>
        <p>Breathing Problems, Chest Pain, Congestive Heart Failure, Heart Rate Problems</p>
        <p><b class="important-color">Alert: </b>Dizziness can be described as light headedness, feeling faint, fuzzy or a sensation of motion or the environment such as spinning or whirling</p>
      </div>
      <div data-step="2">
        <assessment-panel class="col-xs-6">
          <h4><b>Assessment</b></h4><hr>
          <h4><b class="attention-color">Is Chest pain present? Heart Rate Problems?</b></h4>
        </assessment-panel>
        <action-panel class="col-xs-6">
          <h4><b>Action Taken</b></h4><hr>
            <div class="action-content">
              <h4>IF <b class="important-color">YES</b>,</h4>
              <a href="{{ url('/protocol_show/1')}}">Go to Chest Pain Protocol</a></br>
              <a href="{{ url('/protocol_show/7')}}">Go to Heart Rate Problem Protocol</a>
            </div>
        </action-panel>
      </div>
      <div data-step="3">
        <assessment-panel class="col-xs-6">
          <h4><b>Assessment</b></h4><hr>
          <h4><b class="attention-color">In addition to the dizziness, are any of the following present?</b></h4>
          <fieldset class="checkboxgroup">
            <ul>
              <li><label><input type="checkbox">Sudden onset of weakness or numbness in the face, arms or legs on one side of body</label></li>
              <li><label><input type="checkbox">Difficulty speaking or walking, confusion, facial droop</label></li>
              <li><label><input type="checkbox">Loss of consciousness</label></li>
              <li><label><input type="checkbox">Heart rate < 50 or >130 beats per minute or irregular heart rhythm</label></li>
              <li><label><input type="checkbox">Fever, pale skin and weakness</label></li>
              <li><label><input type="checkbox">Persistent severe headache or change in vision</label></li>
              <li><label><input type="checkbox">History of blood clotting problems</label></li>
              <li><label><input type="checkbox">Heart palpitations with no associated symptoms</label></li>
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
            </div>
        </action-panel>
      </div>
      <div data-step="4" class="container-fluid row">
        <assessment-panel class="col-xs-6">
          <h4><b>Assessment</b></h4><hr>
          <h4><b class="attention-color">Are any of the complaints present?</b></h4>
          <fieldset class="checkboxgroup">
            <ul>
              <li><label><input type="checkbox">History of recent trauma or injury to the head < 48 hours</label></li>
              <li><label><input type="checkbox">Recent history of severe vomiting, diarrhea, or bleeding and dizziness when changing of position from sitting to standing</label></li>
              <li><label><input type="checkbox">History of diabetes (check the blood sugar if patient has a blood glucose machine or if a caregiver can help)</label></li>
              <li><label><input type="checkbox">Dizziness occurs after taking a new medication</label></li>
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
                <li>Initiate by bringing forward the SOC appointment (arrange for force booking if requested by on-call physician)</li>
                <li>Engage service support as required or as per physician requested (Home care or Home Visit)</li>
                <li>Consult on-call physician for advice only when  all interventions are attempted (refer to CareHub On-Call Physician List)</li>
              </ul>
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
      <div data-step="5" class="container-fluid row">
        <assessment-panel class="col-xs-6">
          <h4><b>Assessment</b></h4><hr>
          <h4><b class="attention-color">Are any of the complaints present?</b></h4>
          <fieldset class="checkboxgroup">
            <ul>
              <li><label><input type="checkbox">Ear pain, ringing in the ears, or loss of hearing</label></li>
              <li><label><input type="checkbox">Fever and unresponsive to fever reducing measures</label></li>
              <li><label><input type="checkbox">Persistent light-headedness > 3 days</label></li>
              <li><label><input type="checkbox">Increase in stress</label></li>
              <li><label><input type="checkbox">Dizziness occurs during or after consuming alcohol</label></li>
            </ul>
          </fieldset>
        </assessment-panel>
        <action-panel class="col-xs-6">
          <h4><b>Action Taken</b></h4><hr>
            <div class="action-content">
              <h4>IF <b class="important-color">YES</b>,</h4>
              <ul>
                <li>Consult nearest GP or polyclinic immediately</li>
                <li>Check if medications are taken (if not taken yet)</li>
              </ul>
            </div>
        </action-panel>
      </div>
      <div data-step="6">
        <h4><b class="attention-color">Home Care Instructions</b></h4><hr>
        <ul>
          <li>Consult with a General Practitioner or polyclinic when pain is relieve during a
          dizzy spell, reach out and touch something, then lie down flat or sit up. Take
          deep breaths for a few minutes.</li>
          <li>If dizziness is accompanied by anxiety, rapid breathing and numbess in the face or fingers, breathe slowly and control your breathing as much as possible. Breathe in through your nose and blow out from your mouth slowly for 5 to 10 minutes</li>
          <li>Increase fluid intake unless your physician has prescribed a fluid restrictive regime</li>
          <li>Sit up or stand up slowly. Avoid sudden changes in posture</li>
          <li>Limit intake of caffeinated beverages and alcohol</li>
          <li>If dehydrated, drink plenty of water or sports drink</li>
        </ul>
      </div>
    </div>
  </div></div><!--/.guide-panel-->
</div><!--/.fluid-container-->

@stop
