@extends('protocols.protocolLayout')

@section('protocol_content')

<div class="container-fluid">
  <h3><strong>Breathing Problem</strong></h3>
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
        <p>Description of shortness of breath (SOB), what was patient dpoing prior to SOB, associated symptoms, any medications taken, duration of breathlessness, any relieved by medication</p>
        <h4 class="attention-color"><b>Other Protocols to consider:</b></h4>
        <p>Congestive Heart Failure, Chest Pain, Dizziness, Heart Rate Problems, Nausea/Vomiting</p>
      </div>
      <div data-step="2" class="container-fluid row">
        <assessment-panel class="col-xs-6">
          <h4><b>Assessment</b></h4><hr>
          <h4><b class="attention-color">Are any of the complaints present?</b></h4>
          <fieldset class="checkboxgroup">
            <ul>
              
              <li><label><input type="checkbox">Chest pain</label></li>
              <li><label><input type="checkbox">Blue lips or tongue</label></li>
              <li><label><input type="checkbox">Clammy skin</label></li>
              <li><label><input type="checkbox">Feeling of suffocation</label></li>
              <li><label><input type="checkbox">Altered mental status</label></li>
              <li><label><input type="checkbox">Severe shortness of breath with sudden onset</label></li>
              <li><label><input type="checkbox">History of pulmonary embolus, blood clots, or lung collapse</label></li>
              <li><label><input type="checkbox">Severe wheezing and history of asthma not relieved with inhaler</label></li>
              <li><label><input type="checkbox">Inability to speak</label></li>
              <li><label><input type="checkbox">Drooling and inability to swallow</label></li>
              <li><label><input type="checkbox">Difficulty breathing after inhalation of smoke, cflames or fumes</label></li>
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
              <p>Instruct patient to take one adult aspirin (if prescribed by doctor) or one sublingual GTN before ambulance arrives</p>
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
              <li><label><input type="checkbox">Difficulty taking a deep breath because of severe pain</label></li>
              <li><label><input type="checkbox">Recent trauma, surgery, or childbirth</label></li>
              <li><label><input type="checkbox">Inhalation of a foreign body</label></li>
              <li><label><input type="checkbox">Exposure to something that previously caused a significant reaction (sting, medication, plant, chemical, food or animal)</label></li>
              <li><label><input type="checkbox">Speaking in short words</label></li>
              <li><label><input type="checkbox">Inability to breathe lying down or need to sit up to breathe</label></li>
              <li><label><input type="checkbox">Adult with temperature &gt;39 degree</label></li>
              <li><label><input type="checkbox">Progressively worsening shortness of breath</label></li>
            </ul>

          </fieldset>
        </assessment-panel>
        <action-panel class="col-xs-6">
          <h4><b>Action Taken</b></h4><hr>
            <div class="action-content">
              <h4>IF <b class="important-color">YES</b>,</h4>
              <ul>
                <li>Consult nearest GP immediately</li>
                <li>Check if medications are taken taken (if not taken yet)</li>
                <li>Consider Escalation protocol</li>
                <li>Consider bringing forward TCU appointment</li>
              </ul>
              <br>
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
              <li><label><input type="checkbox">Speaking in partial sentences</label></li>
              <li><label><input type="checkbox">Tight cough</label></li>
              <li><label><input type="checkbox">Mild audible wheezes at rest</label></li>
              <li><label><input type="checkbox">Pain increasing with breathing</label></li>
              <li><label><input type="checkbox">Upper respiratory infection and prior hospitalizations for same symptoms</label></li>
              <li><label><input type="checkbox">Inability to sleep &gt; 1 to 2 hours due to coughing or difficulty in breathing</label></li>
              <li><label><input type="checkbox">History of diabetes or heart disease</label></li>
            </ul>
          </fieldset>
        </assessment-panel>
        <action-panel class="col-xs-6">
          <h4><b>Action Taken</b></h4><hr>
            <div class="action-content">
              <h4>IF <b class="important-color">YES</b>,</h4>
              <ul>
                <li>Consult nearest GP with 24 hours or nearest Primary Health Care</li>
                <li>Check if medications are taken (if not taken yet)</li>          
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
              <li><label><input type="checkbox">Fever</label></li>
              <li><label><input type="checkbox">Productive cough with green or yellow sputum</label></li>
              <li><label><input type="checkbox">Numbness or tingling in the fingers or face</label></li>
              <li><label><input type="checkbox">Recent exposure to a stressful event or situation</label></li>
              <li><label><input type="checkbox">Exposure to environmental irritant, allergies or recent cold or flu symptoms</label></li>
              <li><label><input type="checkbox">Nasal congestion</label></li>
              <li><label><input type="checkbox">Productive cough with clear sputum</label></li>
            </ul>
          </fieldset>
        </assessment-panel>
        <action-panel class="col-xs-6">
          <h4><b>Action Taken</b></h4><hr>
            <div class="action-content">
              <h4>IF <b class="important-color">YES</b>,</h4>
              <ul>
                <li>Consult nearest GP with 24 hours or nearest Primary Health Care</li>
                <li>Check if medications are taken (if not taken yet)</li>          
              </ul>
            </div>
        </action-panel>
      </div>
      
      <div data-step="6">
        <h4><b class="attention-color">Home Care Instructions</b></h4><hr>
        <ul>
          <li>Use routine prescriptions as directed</li>
          <li>Rest or sleep with head elevated on a couple of pillows if lying flat increases breathing difficulty</li>
          <li>Increase fluid intake unless your physician has prescribed a fluid restrictive regime</li>
          <li>Avoid environmental irritants (smoke, chemicals, pets) and other irritants that seem to worsen your symptoms</li>
          <li>If rapid breathing, tingling in the face or hands and anxiety are present, slow down the breaths by breathing in through the nose and exhale very slowly from the mouth. Try to follow the breathing steps as slowly as possible. Engage care giver if possible to assist in the process.</li>
        </ul>
      </div>
    </div>
  </div></div><!--/.guide-panel-->
</div><!--/.fluid-container-->

@stop
