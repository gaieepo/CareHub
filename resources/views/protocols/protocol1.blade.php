@extends('protocols.protocolLayout')

@section('protocol_content')
<div class="container-fluid">
  <h3><strong>Chest Pain</strong></h3>
  <div data-wizard-init>
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
        <h4>Key Questions to take note:</h4>
        <p>Description of pain, what was patient doing prior to chest pain, associated symptoms, any medications taken, duration of pain, relieved by medication, pain scale</p>
        <h4>Other Protocols to consider:</h4>
        <p>Breathing Problems, Common Cold Symptoms, Congestion, Congestive Heart Failure, Cough, Dizziness, Heartburn, Heart Rate Problems, Indigestion, Nausea/Vomiting</p>
      </div>
      <div data-step="2" class="container-fluid row">
        <assessment-panel class="col-xs-6">
          <h4>Assessment</h4>
          <h4>Are any of the complaints present?</h4>
          <fieldset class="checkboxgroup">
            <label>
              <input type="checkbox"> &nbsp Continuous or intermittent pain tightness, pressure, or discomfort accompanied by the following:
            </label>
            <ul>
              <label><input type="checkbox"> shortness of breath</label><br>
              <label><input type="checkbox"> dizziness or weakness</label><br>
              <label><input type="checkbox"> diaphoresis</label><br>
              <label><input type="checkbox"> nausea or vomiting</label><br>
              <label><input type="checkbox"> pain radiated to jaw, neck, back, shoulder or arm</label><br>
              <label><input type="checkbox"> fast heart rate</label><br>
            </ul>
            <label>
              <input type="checkbox"> &nbsp Chest pain persists, unrelieved by rest, pain medication (eg, analgesia, antacid) or nitroglycerin every 5 minutes (number of doses taken, spray or sublingual)
            </label>
            <label>
              <input type="checkbox"> &nbsp Anginal chest pain at rest (eg, pale, diaphoresis, SOB, near syncope)
            </label>
            <label>
              <input type="checkbox"> &nbsp Pain not relieved by two nitroglycerin tablets
            </label>
            <label>
              <input type="checkbox"> &nbsp Coughing up blood (moderate to large amount)
            </label>
            <label>
              <input type="checkbox"> &nbsp Heart palpitations with dizziness or near syncope
            </label>
          </fieldset>
        </assessment-panel>
        <action-panel class="col-xs-6">
          <h4>IF YES,</h4>
          <p>Instruct care giver or patient to ACTIVATE 995 Ambulance for help</p>
          <p>CareHub Team to activate 995 Ambulance on behalf if:</p>
          <ul>
            <li>Patient sounded in distress</li>
            <li>Drowsy</li>
            <li>Altered mental status</li>
          </ul>
          <p>Instruct patient to take one adult aspirin (if prescribed by doctor) or one sublingual GTN before ambulance arrives</p>
        </action-panel>
      </div>
      <div data-step="3" class="container-fluid row">
        <assessment-panel class="col-xs-6">
          <h4>Assessment</h4>
          <h4>Are any of the complaints present?</h4>

        </assessment-panel classs="col-xs-6">
        <action-panel>
        <action-panel>
      </div>
      <div data-step="4">
        <h4>Delivery</h4>
        <p>
        Nullam sit amet sollicitudin leo. Donec lobortis est a sagittis ornare. Mauris mattis dui sit amet tortor dapibus, sit amet scelerisque nisl fermentum. Praesent efficitur ac mauris sit amet placerat. Pellentesque ultricies, nibh eu elementum convallis, sapien dolor egestas nunc, vitae volutpat lorem orci sed libero. Nullam posuere, massa a tempor maximus, tortor enim ultricies urna, pretium viverra nisi urna id erat? Etiam nec dolor condimentum, consequat velit sagittis, luctus metus. Proin molestie neque justo, ut elementum arcu congue faucibus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla orci est, elementum et venenatis congue, pharetra in lorem. Fusce a blandit arcu.
        </p>
      </div>
      <div data-step="5">
        <h4>Payment</h4>
        <p>
        Ut sed dignissim orci. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam scelerisque dapibus magna id scelerisque. Donec enim ligula, commodo ut sapien vitae, tincidunt tincidunt orci. Etiam faucibus sit amet ante ut ultrices. Etiam lacinia purus et sem fermentum commodo. Morbi a nulla ac purus cursus viverra. Fusce mauris sem, blandit quis arcu nec, posuere porta purus? Curabitur sit amet mauris tortor. Etiam pulvinar lacinia quam, vel interdum orci vulputate non. Praesent pharetra justo in lacus lacinia convallis. Morbi viverra blandit ultrices.
        </p>
      </div>
      <div data-step="6">
        <h4>Special needs</h4>
        <p>
        Cras iaculis nulla in tortor mollis tincidunt. Nulla vitae vehicula tellus. Nulla suscipit elit nibh, quis mattis purus posuere dictum. Donec varius at justo vel commodo! Phasellus leo enim, scelerisque eleifend mi non, laoreet tempor neque. Mauris tortor felis, varius quis sodales ut, accumsan sed magna. Duis sodales eros et ipsum condimentum, nec auctor leo rutrum. Maecenas lacinia ligula non tellus efficitur bibendum. Donec vitae ultricies diam.
        </p>
      </div>
    </div>
  </div>
</div><!--/.fluid-container-->

@stop
