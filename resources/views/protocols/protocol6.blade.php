@extends('protocols.protocolLayout')

@section('protocol_content')
<div class="container-fluid">
  <h3><strong>Escalation</strong></h3>
  <div class="guide-panel"><div data-wizard-init>
    <ul class="steps">
      <li data-step="1">Notes</li>
      <li data-step="2">Step A</li>
      <li data-step="3">Step B</li>
      <li data-step="4">Home Care</li>
    </ul>
    <div class="steps-content">
      <div data-step="1">
        <h4 class="important-color"><b>Key note:</b></h4>
        <p>Guides to identify and escalate to physicians for medical interventions or advice when patients presented with acute change in conditions</p>
        <h4 class="attention-color"><b>Other Protocols to consider:</b></h4>
        <p>Congestive Heart Failure, Chest Pain, Breathing Problem, Heart Rate Problems, Syncope</p>
      </div>
      <div data-step="2" class="container-fluid row">
        <assessment-panel class="col-xs-6">
          <h4><b>Assessment</b></h4><hr>
          <h4><b class="attention-color">Emergency situation?</b></h4>
          <fieldset class="checkboxgroup">
            <ul>
              <li><label><input type="checkbox">Severe shortness of breath with sudden onset</label></li>
              <li><label><input type="checkbox">Feeling of suffocation</label></li>
              <li><label><input type="checkbox">Blue lips or tongue</label></li>
              <li><label><input type="checkbox">Altered mental status</label></li>
              <li><label><input type="checkbox">Inability to speak</label></li>
              <li><label><input type="checkbox">Chest pain(Pain score>5)</label></li>
              <li><label><input type="checkbox">Clammy skin</label></li>
              <li><label><input type="checkbox">Severe wheezing and history of asthma not relieved with inhaler</label></li>
              <li><label><input type="checkbox">Syncope / drowsiness</label></li>
              <li><label><input type="checkbox">Acute weakness</label></li>
              <li><label><input type="checkbox">Prolong seizure</label></li>
              <li><label><input type="checkbox">Fall with/without head injury and unconscious</label></li>
              <li><label><input type="checkbox">Severe bleeding</label></li>
              <li><label><input type="checkbox">Systolic blood pressure <90mmHg (if available)</label></li>
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
          <h4><b class="attention-color">Non Emergency situation?</b></h4>
          <fieldset class="checkboxgroup">
            <ul>
              <li><label><input type="checkbox">Speaking in short words</label></li>
              <li><label><input type="checkbox">Inability to breathe lying down or need to sit up to breathe</label></li>
              <li><label><input type="checkbox">Progressively worsening shortness of breath</label></li>
              <li><label><input type="checkbox">Speaking in partial sentences</label></li>
              <li><label><input type="checkbox">Mild audible wheezes at rest</label></li>
              <li><label><input type="checkbox">Pain increasing with breathing</label></li>
              <li><label><input type="checkbox">Adult with temperature >39 degree</label></li>
              <li><label><input type="checkbox">Tight cough</label></li>
              <li><label><input type="checkbox">Upper respiratory infection and prior hospitalizations for same symptoms</label></li>
              <li><label><input type="checkbox">Inability to sleep > 1 to 2 hours due to coughing or difficulty in breathing</label></li>
              <li><label><input type="checkbox">Difficulty taking a deep breath because of severe pain</label></li>
              <li><label><input type="checkbox">Inhalation of a foreign body</label></li>
              <li><label><input type="checkbox">Exposure to something that previously caused a significant reaction (sting, medication, plant, chemical, food or animal)</label></li>
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
                <li>Drowsy</li>
                <li>Altered mental status</li>
              </ul>
            </div>
        </action-panel>
      </div>
      <div data-step="4">
        <h4><b class="attention-color">Home Care Instructions</b></h4><hr>
        <ul>
          <li>Use routine prescriptions as directed</li>
          <li>Rest or sleep with head elevated on a couple of pillows if lying flat increases breathing difficulty</li>
          <li>Increase fluid intake unless your physician has prescribed a fluid restrictive regime</li>
          <li>If rapid breathing, tingling in the face or hands and anxiety are present, slow down the breaths by breathing in through the nose and exhale very slowly from the mouth. Try to follow the breathing steps as slowly as possible. Engage care giver if possible to assist in the process.</li>
        </ul>
      </div>
    </div>
  </div></div><!--/.guide-panel-->
</div><!--/.fluid-container-->

@stop
