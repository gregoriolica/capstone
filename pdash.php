<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JAM Lying-In Clinic Patient Dashboard</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            display: flex;
            max-width: 1400px;
            margin: 0 auto;
            gap: 0;
            height: calc(100vh - 40px);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .sidebar {
            background: rgb(82, 45, 94);
            width: 250px;
            padding: 30px 20px;
            color: white;
            position: relative;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 40px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo::before {
            content: "🏥";
            font-size: 28px;
        }

        .nav-item {
            display: flex;
            align-items: center;
            padding: 12px 15px;
            margin-bottom: 8px;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
        }

        .nav-item:hover, .nav-item.active {
            background: rgba(255, 255, 255, 0.1);
            color: white;
        }

        .nav-item.active {
            background: rgba(255, 255, 255, 0.25);
        }

        .nav-item::before {
            margin-right: 12px;
            font-size: 18px;
        }

        .nav-item:nth-child(2)::before { content: "👥"; }
        .nav-item:nth-child(3)::before { content: "🏥"; }
        .nav-item:nth-child(4)::before { content: "📑"; }
        .nav-item:nth-child(5)::before { content: "⚙️"; }
        .nav-item:nth-child(6)::before { content: "🔓"; }

        .main-content {
            flex: 1;
            background: white;
            display: flex;
            flex-direction: column;
            overflow-y: auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 32px;
            background: white;
            border-bottom: 1px solid rgba(108, 51, 110, 0.1);
        }

        .header-title {
            color: #2d3748;
            font-size: 24px;
            font-weight: 600;
        }

        .header-actions {
            display: flex;
            gap: 10px;
        }

        .btn {
            background: linear-gradient(90deg, #ff6ba2 0%, #667eea 100%);
            color: white;
            padding: 5px 10px;
            gap: 10px;
            border-radius: 4px;
            font-weight: 500;
            cursor: pointer;
            border: none;
            font-size: 15px;
        }

        .btn:hover {
            background:rgb(148, 0, 158);
        }

        .btn-primary {
            background: linear-gradient(90deg, #ff6ba2 0%, #667eea 100%);
            color: white;
            padding: 10px 22px;
            border-radius: 8px;
            border: none;
            font-weight: 300;
            cursor: pointer;
            transition: all 0.2s ease;
            font-size: 12px;
            box-shadow: 0 2px 8px rgba(108, 51, 110, 0.08);
        }

        .btn-primary:hover {
            background:rgb(148, 0, 158);
        }

        .btn-secondary {
            background: #f8f9fe;
            color: #7c3a8a;
            padding: 8px 16px;
            border-radius: 0px;
            border: none;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .content {
            padding: 32px;
            display: grid;
            grid-template-columns: 1.5fr 1fr;
            gap: 32px;
            background: #f8f9fe;
            min-height: calc(100vh - 80px);
        }

        .patient-info {
            background: white;
            border-radius: 20px;
            padding: 32px;
            box-shadow: 0 4px 24px rgba(108, 51, 110, 0.06);
        }

        .patient-header {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 32px;
        }

        .photo-container {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            overflow: hidden;
            background: #f7fafc;
        }

        .patient-photo {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #e2e8f0;
        }

        .photo-upload {
            position: absolute;
            bottom: -5px;
            right: -5px;
            width: 30px;
            height: 30px;
            background: #4299e1;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            color: white;
            font-size: 14px;
        }

        .photo-upload input {
            display: none;
        }

        .patient-details h2 {
            font-size: 24px;
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 4px;
        }

        .patient-id {
            color: #718096;
            font-size: 14px;
            margin-bottom: 4px;
        }

        .patient-email {
            color: #4299e1;
            font-size: 14px;
        }

        .info-section {
            background: white;
            border-radius: 20px;
            box-shadow: 0 4px 24px rgba(108, 51, 110, 0.06);
            padding: 32px 20px 24px 15px;
            margin-top: 24px;
            margin-bottom: 0;
        }

        .info-section h3 {
            color: #7c3a8a;
            font-size: 22px;
            font-weight: 700;
        }

        .info-section h3:first-child {
            margin: 0 0 24px 0;
        }

        .info-section h3:not(:first-child) {
            margin: 40px 0 24px 0;
        }

        .info-item {
            display: block;
            padding: 8px 0;
            border-bottom: 1px solid #f3e6f7;
        }

        .info-item:last-child {
            border-bottom: none;
        }

        .info-label {
            color: #a0aec0;
            font-size: 16px;
            font-weight: 400;
            display: inline;
        }

        .info-value {
            color: #3d225a;
            font-size: 16px;
            font-weight: 600;
            display: inline;
            margin-left: 6px;
        }

        .appointments-section {
            background: white;
            border-radius: 20px;
            padding: 24px;
            box-shadow: 0 4px 24px rgba(108, 51, 110, 0.06);
            margin-bottom: 32px;
        }

        .appointments-section h3 {
            color: #7c3a8a;
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .appointments-item {
            background: #f8f9fe;
            border-radius: 16px;
            padding: 20px;
            margin-bottom: 16px;
        }

        .appointments-date {
            font-size: 18px;
            font-weight: 600;
            color: #7c3a8a;
            margin-bottom: 8px;
        }

        .appointments-type {
            color: #718096;
            font-size: 14px;
        }

        .appointments-doctor {
            color: #718096;
            font-size: 14px;
            margin-bottom: 8px;
            text-align: left;
        }

        .appointments-status {
            display: inline-block;
            padding: 6px 12px;
            background: #c6f6d5;
            color: #22543d;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 500;
        }

        .files-section {
            background: white;
            border-radius: 20px;
            padding: 24px;
            box-shadow: 0 4px 24px rgba(108, 51, 110, 0.06);
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .section-title {
            color: #7c3a8a;
            font-size: 20px;
            font-weight: 600;
        }

        .file-item {
            display: flex;
            align-items: center;
            padding: 16px;
            background: #f8f9fe;
            border-radius: 12px;
            margin-bottom: 12px;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .file-item:hover {
            background: rgba(108, 51, 110, 0.05);
        }

        .file-icon {
            width: 40px;
            height: 40px;
            background: #6c336e;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 20px;
            margin-right: 16px;
        }

        .file-info {
            flex: 1;
        }

        .file-name {
            color: #2d3748;
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 4px;
        }

        .file-date {
            color: #718096;
            font-size: 12px;
        }

        .note-item {
            padding: 15px;
            background: #f7fafc;
            border-radius: 10px;
            margin-bottom: 15px;
        }

        .note-content {
            color: #1a202c;
            font-size: 14px;
            line-height: 1.5;
        }

        @media (max-width: 1024px) {
            .content {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }
            
            .sidebar {
                width: 100%;
                height: auto;
            }
        }

        /* Add Doctor Schedule styles */
        .schedule-item {
            background: #f8f9fe;
            border-radius: 12px;
            padding: 16px;
            margin-bottom: 12px;
            display: flex;
            flex-direction: column;
            gap: 4px;
        }
        .schedule-date {
            color: #7c3a8a;
            font-weight: 600;
            font-size: 15px;
        }
        .schedule-time {
            color: #718096;
            font-size: 14px;
        }
        .schedule-doctor {
            color: #2d3748;
            font-size: 14px;
            font-weight: 500;
        }
        .schedule-status {
            display: inline-block;
            margin-top: 4px;
            padding: 4px 12px;
            border-radius: 16px;
            font-size: 13px;
            font-weight: 500;
        }
        .schedule-status-available {
            background: #c6f6d5;
            color: #22543d;
        }
        .schedule-status-booked {
            background: #fed7d7;
            color: #c53030;
        }

        /* Modal styles */
        .modal-overlay {
            position: fixed;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(44, 19, 56, 0.25);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;
        }
        .modal-content {
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(108, 51, 110, 0.18);
            padding: 32px 28px 24px 28px;
            min-width: 320px;
            max-width: 90vw;
        }
        .modal-content label {
            color: #7c3a8a;
            font-weight: 500;
            display: block;
            margin-bottom: 4px;
        }
        .modal-content input, .modal-content select {
            width: 100%;
            padding: 8px 10px;
            border-radius: 6px;
            border: 1px solid #e2e8f0;
            margin-bottom: 8px;
            font-size: 15px;
        }

        .doctor-list {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }
        .doctor-list-item {
            background: #f8f9fe;
            border-radius: 12px;
            padding: 16px;
            color: #7c3a8a;
            font-weight: 600;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.2s;
        }
        .doctor-list-item:hover {
            background: #e9d8fd;
        }

        #updateModal .modal-content {
            min-width: 340px;
            max-width: 480px;
            width: 100%;
            box-sizing: border-box;
            padding: 32px 32px 24px 32px;
            overflow-y: auto;
            max-height: 90vh;
        }
        #updateModal .modal-content label {
            color: #7c3a8a;
            font-weight: 500;
            display: block;
            margin-bottom: 2px;
            margin-top: 8px;
        }
        #updateModal .modal-content input, #updateModal .modal-content select {
            width: 100%;
            padding: 9px 12px;
            border-radius: 6px;
            border: 1px solid #e2e8f0;
            margin-bottom: 12px;
            font-size: 15px;
            box-sizing: border-box;
        }
        #updateModal .modal-content fieldset {
            margin-bottom: 24px;
            padding: 0 0 8px 0;
            border: none;
        }
        #updateModal .modal-content legend {
            color: #7c3a8a;
            font-weight: 600;
            margin-bottom: 10px;
            font-size: 18px;
            padding: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <div class="logo">JAM Lying-In Clinic</div>
            <div class="nav-item active" id="dashboardNav">Dashboard</div>
            <div class="nav-item" id="medrecNav">Medical Record</div>
            <div class="nav-item" id="billingNav">Billings</div>
            <div class="nav-item">Settings</div>
            <a href="logout.php" class="nav-item sign-out" style="margin-top: 30px; background: rgba(255,255,255,0.2); color: white; text-align: center; font-weight: bold; border-radius: 25px;">Sign Out</a>
        </div>

        <!-- main dashboard -->
        <div class="main-content" id="mainContent" style="display: block;"> 
            <div class="header">
                <h1 class="header-title">Patient Dashboard</h1>
            </div>

            <div class="content">
                <div class="patient-info">
                    <div class="patient-header">
                        <div class="photo-container">
                            <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iODAiIGhlaWdodD0iODAiIHZpZXdCb3g9IjAgMCA4MCA4MCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48Y2lyY2xlIGN4PSI0MCIgY3k9IjQwIiByPSI0MCIgZmlsbD0iI0Y3RkFGQyIvPjxjaXJjbGUgY3g9IjQwIiBjeT0iMzAiIHI9IjEyIiBmaWxsPSIjNEE1NTY4Ii8+PHBhdGggZD0iTTIwIDYwYzAtMTEgOS0yMCAyMC0yMHMyMCA5IDIwIDIwdjEwSDIwVjYweiIgZmlsbD0iIzRBNTU2OCIvPjwvc3ZnPg==" alt="Patient Photo" class="patient-photo">
                        </div>
                        <div class="patient-details">
                            <h2></h2>
                            <div class="patient-id"></div>
                            <div class="patient-email"></div>
                        </div>

                    </div>

                    <div class="info-section">
                    <button class="btn" id="openUpdateModal">UPDATE</button>
                        <h3>General Information</h3>
                        <div class="info-item">
                            <span class="info-label">Date of birth:</span>
                            <span class="info-value"></span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Age:</span>
                            <span class="info-value"></span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Gender:</span>
                            <span class="info-value"></span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Status:</span>
                            <span class="info-value"></span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Contact Number:</span>
                            <span class="info-value"></span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Occupation:</span>
                            <span class="info-value"></span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Address:</span>
                            <span class="info-value"></span>
                        </div>
                        <h3>In Case of Emergency</h3>
                        <div class="info-item">
                            <span class="info-label">Name:</span>
                            <span class="info-value"></span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Contact Number:</span>
                            <span class="info-value"></span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Address:</span>
                            <span class="info-value"></span>
                        </div>
                    </div>
                </div>

                <div class="right-side">
                    <div class="appointments-section">
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                            <h3>📅 Appointments </h3>
                            <button class="btn-primary" id="openScheduleModal">Schedule Appointment</button>
                        </div>
                        <!-- Awaiting backend appointment data -->
                    </div>

                    <div class="files-section">
                        <div class="section-header">
                            <h3 class="section-title">Doctors</h3>
                        </div>
                        <div class="doctor-list">
                            <!-- Awaiting backend doctor data -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Medical Record Section (hidden by default, now inside .container) -->
        <div id="medrecDashboard" style="display:none; flex: 1; background: #f9fafc; overflow-y: auto; max-height: calc(100vh - 40px);">
          <div style="padding: 32px; max-width: 1200px; margin: 0 auto;">
            <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 32px;">
              <div style="display: flex; flex-direction: column; align-items: flex-start; gap: 0;">
                <h1 style="font-size: 36px; color: #232b3b; font-weight: 700; margin: 0 0 8px 0;">Medical Record</h1>
                <div style="font-size: 22px; font-weight: 600; color: #232b3b; margin-bottom: 2px;"></div>
                <div style="font-size: 15px; color: #7c8ba1; font-weight: 500;"></div>
              </div>
              <div style="color: #7c8ba1; font-size: 15px; display: flex; align-items: center; gap: 8px; margin-top: 8px;">
                <span id="medrecCurrentDate" style="font-size: 18px;"></span>
              </div>
            </div>
            <div style="display: block; width: 100%;">
              <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px; margin-bottom: 32px; align-items: stretch;">
                <!-- Age of Gestation Card -->
                <div style="background: #fff; border-radius: 18px; box-shadow: 0 4px 24px rgba(44,62,80,0.08); padding: 28px 32px; display: flex; flex-direction: column; align-items: center; justify-content: center;">
                  <svg width="90" height="90" style="margin-bottom: 10px;"><circle cx="45" cy="45" r="40" stroke="#e2e8f0" stroke-width="8" fill="none"/><circle cx="45" cy="45" r="40" stroke="#6ee7b7" stroke-width="8" fill="none" stroke-dasharray="251" stroke-dashoffset="80" stroke-linecap="round"/></svg>
                  <div style="font-size: 26px; font-weight: 700; color: #232b3b; margin-bottom: 2px;"></div>
                  <div style="font-size: 15px; color: #7c8ba1; font-weight: 500;">Age of Gestation</div>
                </div>
                <!-- Analytics Table -->
                <div style="background: #fff; border-radius: 18px; box-shadow: 0 4px 24px rgba(44,62,80,0.08); padding: 24px 32px; display: flex; flex-direction: column; justify-content: flex-start; min-width:0;">
                  <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 16px;">
                    <div style="font-size: 18px; color: #232b3b; font-weight: 700;">Visit Analytics</div>
                    <form id="analyticsSearchForm" style="display: flex; align-items: center; gap: 8px;">
                      <input type="date" id="analyticsDate" name="analyticsDate" style="padding: 6px 10px; border-radius: 6px; border: 1px solid #e2e8f0; font-size: 15px;">
                      <button type="submit" class="btn-primary" style="padding: 7px 16px; font-size: 14px; border-radius: 6px;">Search</button>
                    </form>
                  </div>
                  <div style="overflow-x:auto;">
                  <table style="width:100%; border-collapse:collapse; font-size:15px;">
                    <thead>
                      <tr style="background:#f8f9fe; color:#7c3aed;">
                        <th style="padding:8px 10px; text-align:left;">Visit Date</th>
                        <th style="padding:8px 10px; text-align:left;">BP</th>
                        <th style="padding:8px 10px; text-align:left;">Temp</th>
                        <th style="padding:8px 10px; text-align:left;">Weight</th>
                        <th style="padding:8px 10px; text-align:left;">Fundal Height</th>
                        <th style="padding:8px 10px; text-align:left;">Fetal Heart Tone</th>
                        <th style="padding:8px 10px; text-align:left;">Fetal Position</th>
                        <th style="padding:8px 10px; text-align:left;">Chief Complaint</th>
                      </tr>
                    </thead>
                    <tbody>
                      <!-- Awaiting backend analytics data -->
                    </tbody>
                  </table>
                  </div>
                </div>
              </div>
              <div style="display: block; width: 100%;">
                <div id="medrecTabs" style="display: flex; gap: 32px; align-items: center; border-bottom: 2px solid #e0e7ff; margin-bottom: 18px; width: 100%;">
                  <button 
                    type="button" 
                    id="physicalExamTab"
                    class="medrec-tab active"
                    style="background: none; border: none; font-size: 16px; font-weight: 600; color: #7c3aed; padding-bottom: 8px; border-bottom: 2px solid #7c3aed; cursor: pointer; outline: none;"
                  >Physical Examination</button>
                  <button 
                    type="button" 
                    id="medicalHistoryTab"
                    class="medrec-tab"
                    style="background: none; border: none; font-size: 16px; font-weight: 500; color: #a0aec0; padding-bottom: 8px; border-bottom: 2px solid transparent; cursor: pointer; outline: none;"
                  >Medical History</button>
                </div>
                <div id="physicalExamContent">
                  <form id="physicalExamSearchForm" style="display: flex; align-items: center; gap: 8px; margin-bottom: 18px;">
                    <input type="date" id="physicalExamDate" name="physicalExamDate" style="padding: 6px 10px; border-radius: 6px; border: 1px solid #e2e8f0; font-size: 15px;">
                    <button type="submit" class="btn-primary" style="padding: 7px 16px; font-size: 14px; border-radius: 6px;">Search</button>
                  </form>
                  <div style="background: #fff; border-radius: 14px; box-shadow: 0 2px 12px rgba(44,62,80,0.06); padding: 32px; color: #7c8ba1; font-size: 18px; text-align: center;">No physical examination records yet.</div>
                </div>
                <div id="medicalHistoryContent" style="display:none;">
                  <form id="medicalHistorySearchForm" style="display: flex; align-items: center; gap: 8px; margin-bottom: 18px;">
                    <input type="date" id="medicalHistoryDate" name="medicalHistoryDate" style="padding: 6px 10px; border-radius: 6px; border: 1px solid #e2e8f0; font-size: 15px;">
                    <button type="submit" class="btn-primary" style="padding: 7px 16px; font-size: 14px; border-radius: 6px;">Search</button>
                  </form>
                  <div style="background: #fff; border-radius: 14px; box-shadow: 0 2px 12px rgba(44,62,80,0.06); padding: 32px; color: #7c8ba1; font-size: 18px; text-align: center;">No medical history records yet.</div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Billing Dashboard Section (hidden by default) -->
        <div id="billingDashboard" style="display:none; flex: 1; background: #f9fafc; overflow-y: auto; max-height: calc(100vh - 40px);">
          <div style="padding: 32px; max-width: 1200px; margin: 0 auto;">
            <div style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 32px;">
              <h1 style="font-size: 36px; color: #232b3b; font-weight: 700; margin: 0;">Billing Dashboard</h1>
            </div>
            <div style="display: flex; gap: 32px; margin-bottom: 32px;">
              <div style="background: #fff; border-radius: 16px; box-shadow: 0 4px 24px rgba(44,62,80,0.08); padding: 28px 36px; flex:1; display: flex; flex-direction: column; align-items: flex-start;">
                <div style="font-size: 15px; color: #7c8ba1; font-weight: 500;">Outstanding Balance</div>
                <div style="font-size: 28px; font-weight: 700; color: #e53e3e; margin-top: 6px;"></div>
              </div>
              <div style="background: #fff; border-radius: 16px; box-shadow: 0 4px 24px rgba(44,62,80,0.08); padding: 28px 36px; flex:1; display: flex; flex-direction: column; align-items: flex-start;">
                <div style="font-size: 15px; color: #7c8ba1; font-weight: 500;">Last Payment</div>
                <div style="font-size: 22px; font-weight: 700; color: #232b3b; margin-top: 6px;"></div>
                <div style="font-size: 13px; color: #a0aec0; margin-top: 2px;"></div>
              </div>
              <div style="background: #fff; border-radius: 16px; box-shadow: 0 4px 24px rgba(44,62,80,0.08); padding: 28px 36px; flex:1; display: flex; flex-direction: column; align-items: flex-start;">
                <div style="font-size: 15px; color: #7c8ba1; font-weight: 500;">Next Due Date</div>
                <div style="font-size: 22px; font-weight: 700; color: #232b3b; margin-top: 6px;"></div>
              </div>
            </div>
            <div style="background: #fff; border-radius: 18px; box-shadow: 0 2px 12px rgba(44,62,80,0.06); padding: 28px 32px; margin-bottom: 32px;">
              <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 18px;">
                <div style="font-size: 20px; color: #232b3b; font-weight: 700;">Recent Transactions</div>
                <button class="btn-primary" style="padding: 10px 28px; font-size: 15px; border-radius: 8px;">Pay Now</button>
              </div>
              <div style="overflow-x:auto;">
                <table style="width:100%; border-collapse:collapse; font-size:15px;">
                  <thead>
                    <tr style="background:#f8f9fe; color:#7c3aed;">
                      <th style="padding:8px 10px; text-align:left;">Date</th>
                      <th style="padding:8px 10px; text-align:left;">Description</th>
                      <th style="padding:8px 10px; text-align:left;">Amount</th>
                      <th style="padding:8px 10px; text-align:left;">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- Awaiting backend data -->
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
    </div>

    <!-- Modal for scheduling appointment -->
    <div id="scheduleModal" class="modal-overlay" style="display:none;">
      <div class="modal-content" style="max-width: 500px; background: linear-gradient(135deg, #f8f9fe 60%, #e9d8fd 100%); box-shadow: 0 8px 32px rgba(108, 51, 110, 0.18); border-radius: 24px; padding: 0; overflow-y: auto; max-height: 90vh;">
        <div style="background: linear-gradient(90deg, #7c3aed 0%, #ff6ba2 100%); padding: 28px 36px 18px 36px; border-radius: 24px 24px 0 0;">
          <h2 style="color: #fff; font-size: 28px; font-weight: 700; margin: 0; letter-spacing: 1px;">Schedule Appointment</h2>
        </div>
        <form id="scheduleForm" style="padding: 32px 36px 24px 36px;">
          <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px 32px; margin-bottom: 28px;">
            <div style="display: flex; flex-direction: column; gap: 8px; grid-column: 1 / -1;">
              <label for="doctorSelect" style="color: #7c3aed; font-weight: 500;">Doctor</label>
              <select id="doctorSelect" name="doctor" required style="padding: 10px 14px; border-radius: 10px; border: 1.5px solid #e2e8f0; font-size: 16px; background: #fff;">
                <option value="">Select Doctor</option>
                <option value="Dr. Gregorio">Dr. Gregorio</option>
                <option value="Dr. Santos">Dr. Santos</option>
                <option value="Dr. Dela Cruz">Dr. Dela Cruz</option>
              </select>
              <div id="doctorScheduleInfo" style="margin-top: 6px; font-size: 15px; color: #7c3aed; font-weight: 500; min-height: 20px;"></div>
            </div>
            <div style="display: flex; flex-direction: column; gap: 8px;">
              <label for="appointmentDate" style="color: #7c3aed; font-weight: 500;">Date</label>
              <input type="date" id="appointmentDate" name="date" required style="padding: 10px 14px; border-radius: 10px; border: 1.5px solid #e2e8f0; font-size: 16px; background: #fff;">
            </div>
            <div style="display: flex; flex-direction: column; gap: 8px;">
              <label for="timeSlot" style="color: #7c3aed; font-weight: 500;">Time Slot</label>
              <input type="time" id="timeSlot" name="time" required style="padding: 10px 14px; border-radius: 10px; border: 1.5px solid #e2e8f0; font-size: 16px; background: #fff;">
            </div>
            <div style="display: flex; flex-direction: column; gap: 8px; grid-column: 1 / -1;">
              <label for="chiefComplaint" style="color: #7c3aed; font-weight: 500;">Chief Complaint</label>
              <input type="text" id="chiefComplaint" name="complaint" required style="padding: 10px 14px; border-radius: 10px; border: 1.5px solid #e2e8f0; font-size: 16px; background: #fff;">
            </div>
          </div>
          <div style="display:flex; justify-content: flex-end; gap: 10px; margin-top: 18px;">
            <button type="button" class="btn-secondary" id="closeScheduleModal" style="padding: 10px 22px; border-radius: 8px; font-size: 15px;">Cancel</button>
            <button type="submit" class="btn-primary" style="padding: 10px 28px; border-radius: 8px; font-size: 16px; font-weight: 600; background: linear-gradient(90deg, #ff6ba2 0%, #667eea 100%);">Submit</button>
          </div>
        </form>
      </div>
    </div>

    <!-- Doctor Info Modal -->
    <div id="doctorModal" class="modal-overlay" style="display:none;">
        <div class="modal-content">
            <h2 id="modalDoctorName" style="color:#7c3a8a; margin-bottom:10px;"></h2>
            <div style="margin-bottom:10px;"><strong>Speciality:</strong> <span id="modalDoctorSpeciality"></span></div>
            <div style="margin-bottom:10px;"><strong>Schedule:</strong> <span id="modalDoctorSchedule"></span></div>
            <div style="margin-bottom:18px;"><strong>Services:</strong> <span id="modalDoctorServices"></span></div>
            <div style="display:flex; justify-content: flex-end;">
                <button type="button" class="btn-secondary" id="closeDoctorModal">Close</button>
            </div>
        </div>
    </div>

    <!-- Update Patient Modal -->
    <div id="updateModal" class="modal-overlay" style="display:none;">
      <div class="modal-content" style="max-width: 650px; background: linear-gradient(135deg, #f8f9fe 60%, #e9d8fd 100%); box-shadow: 0 8px 32px rgba(108, 51, 110, 0.18); border-radius: 24px; padding: 0; overflow-y: auto; max-height: 90vh;">
        <div style="background: linear-gradient(90deg, #7c3aed 0%, #ff6ba2 100%); padding: 28px 36px 18px 36px; border-radius: 24px 24px 0 0;">
          <h2 style="color: #fff; font-size: 28px; font-weight: 700; margin: 0; letter-spacing: 1px;">Update Patient Information</h2>
        </div>
        <form id="updateForm" style="padding: 32px 36px 24px 36px;">
          <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px 32px; margin-bottom: 28px;">
            <div style="grid-column: 1 / -1; font-size: 18px; color: #7c3aed; font-weight: 600; margin-bottom: 8px;">Patient</div>
            <div style="display: flex; justify-content: center; align-items: center; margin-top: -40px; margin-bottom: 24px;">
              <div style="position: relative; width: 90px; height: 90px;">
                <img id="updatePatientPhoto" src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iODAiIGhlaWdodD0iODAiIHZpZXdCb3g9IjAgMCA4MCA4MCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48Y2lyY2xlIGN4PSI0MCIgY3k9IjQwIiByPSI0MCIgZmlsbD0iI0Y3RkFGQyIvPjxjaXJjbGUgY3g9IjQwIiBjeT0iMzAiIHI9IjEyIiBmaWxsPSIjNEE1NTY4Ii8+PHBhdGggZD0iTTIwIDYwYzAtMTEgOS0yMCAyMC0yMHMyMCA5IDIwIDIwdjEwSDIwVjYweiIgZmlsbD0iIzRBNTU2OCIvPjwvc3ZnPg==" alt="Patient Photo" style="width: 90px; height: 90px; border-radius: 50%; object-fit: cover; border: 3px solid #e2e8f0; background: #f7fafc;">
                <label for="updatePhotoInput" style="position: absolute; bottom: 0; right: 0; background: linear-gradient(90deg, #ff6ba2 0%, #667eea 100%); color: #fff; border-radius: 50%; width: 32px; height: 32px; display: flex; align-items: center; justify-content: center; cursor: pointer; box-shadow: 0 2px 8px rgba(108, 51, 110, 0.12); font-size: 18px; border: 2px solid #fff;">
                  <span style="pointer-events: none;">&#128247;</span>
                  <input id="updatePhotoInput" type="file" accept="image/*" style="display: none;">
                </label>
              </div>
            </div>
            <div style="display: flex; flex-direction: column; gap: 8px;">
              <label style="color: #7c3aed; font-weight: 500;">First Name</label>
              <input type="text" name="firstName" required style="padding: 10px 14px; border-radius: 10px; border: 1.5px solid #e2e8f0; font-size: 16px; background: #fff; transition: border 0.2s;">
            </div>
            <div style="display: flex; flex-direction: column; gap: 8px;">
              <label style="color: #7c3aed; font-weight: 500;">Middle Name</label>
              <input type="text" name="middleName" style="padding: 10px 14px; border-radius: 10px; border: 1.5px solid #e2e8f0; font-size: 16px; background: #fff; transition: border 0.2s;">
            </div>
            <div style="display: flex; flex-direction: column; gap: 8px;">
              <label style="color: #7c3aed; font-weight: 500;">Last Name</label>
              <input type="text" name="lastName" required style="padding: 10px 14px; border-radius: 10px; border: 1.5px solid #e2e8f0; font-size: 16px; background: #fff; transition: border 0.2s;">
            </div>
            <div style="display: flex; flex-direction: column; gap: 8px;">
              <label style="color: #7c3aed; font-weight: 500;">Date of Birth</label>
              <input type="date" name="dob" required style="padding: 10px 14px; border-radius: 10px; border: 1.5px solid #e2e8f0; font-size: 16px; background: #fff; transition: border 0.2s;">
            </div>
            <div style="display: flex; flex-direction: column; gap: 8px;">
              <label style="color: #7c3aed; font-weight: 500;">Age</label>
              <input type="number" name="age" min="0" required style="padding: 10px 14px; border-radius: 10px; border: 1.5px solid #e2e8f0; font-size: 16px; background: #fff; transition: border 0.2s;">
            </div>
            <div style="display: flex; flex-direction: column; gap: 8px;">
              <label style="color: #7c3aed; font-weight: 500;">Gender</label>
              <select name="gender" required style="padding: 10px 14px; border-radius: 10px; border: 1.5px solid #e2e8f0; font-size: 16px; background: #fff;">
                <option value="">Select Gender</option>
                <option value="Female">Female</option>
                <option value="Male">Male</option>
              </select>
            </div>
            <div style="display: flex; flex-direction: column; gap: 8px;">
              <label style="color: #7c3aed; font-weight: 500;">Status</label>
              <select name="status" required style="padding: 10px 14px; border-radius: 10px; border: 1.5px solid #e2e8f0; font-size: 16px; background: #fff;">
                <option value="">Select Status</option>
                <option value="Single">Single</option>
                <option value="Married">Married</option>
                <option value="Widowed">Widowed</option>
                <option value="Separated">Separated</option>
              </select>
            </div>
            <div style="display: flex; flex-direction: column; gap: 8px;">
              <label style="color: #7c3aed; font-weight: 500;">Contact Number</label>
              <input type="text" name="contact" required style="padding: 10px 14px; border-radius: 10px; border: 1.5px solid #e2e8f0; font-size: 16px; background: #fff; transition: border 0.2s;">
            </div>
            <div style="display: flex; flex-direction: column; gap: 8px;">
              <label style="color: #7c3aed; font-weight: 500;">Occupation</label>
              <input type="text" name="occupation" style="padding: 10px 14px; border-radius: 10px; border: 1.5px solid #e2e8f0; font-size: 16px; background: #fff; transition: border 0.2s;">
            </div>
            <div style="display: flex; flex-direction: column; gap: 8px; grid-column: 1 / -1;">
              <label style="color: #7c3aed; font-weight: 500;">Address</label>
              <input type="text" name="address" style="padding: 10px 14px; border-radius: 10px; border: 1.5px solid #e2e8f0; font-size: 16px; background: #fff; transition: border 0.2s;">
            </div>
            <div style="grid-column: 1 / -1; font-size: 18px; color: #7c3aed; font-weight: 600; margin: 18px 0 8px 0;">Emergency Contact</div>
            <div style="display: flex; flex-direction: column; gap: 8px;">
              <label style="color: #7c3aed; font-weight: 500;">Name</label>
              <input type="text" name="emergencyName" required style="padding: 10px 14px; border-radius: 10px; border: 1.5px solid #e2e8f0; font-size: 16px; background: #fff; transition: border 0.2s;">
            </div>
            <div style="display: flex; flex-direction: column; gap: 8px;">
              <label style="color: #7c3aed; font-weight: 500;">Contact Number</label>
              <input type="text" name="emergencyContact" required style="padding: 10px 14px; border-radius: 10px; border: 1.5px solid #e2e8f0; font-size: 16px; background: #fff; transition: border 0.2s;">
            </div>
            <div style="display: flex; flex-direction: column; gap: 8px;">
              <label style="color: #7c3aed; font-weight: 500;">Address</label>
              <input type="text" name="emergencyAddress" style="padding: 10px 14px; border-radius: 10px; border: 1.5px solid #e2e8f0; font-size: 16px; background: #fff; transition: border 0.2s;">
            </div>
            <div style="display: flex; flex-direction: column; gap: 8px;">
              <label style="color: #7c3aed; font-weight: 500;">Relationship</label>
              <select name="relationship" required style="padding: 10px 14px; border-radius: 10px; border: 1.5px solid #e2e8f0; font-size: 16px; background: #fff;">
                <option value="">Select Relationship</option>
                <option value="Parent">Parent</option>
                <option value="Sibling">Sibling</option>
                <option value="Spouse">Spouse</option>
                <option value="Friend">Friend</option>
                <option value="Other">Other</option>
              </select>
            </div>
          </div>
          <div style="display:flex; justify-content: flex-end; gap: 10px; margin-top: 18px;">
            <button type="button" class="btn-secondary" id="closeUpdateModal" style="padding: 10px 22px; border-radius: 8px; font-size: 15px;">Cancel</button>
            <button type="submit" class="btn-primary" style="padding: 10px 28px; border-radius: 8px; font-size: 16px; font-weight: 600; background: linear-gradient(90deg, #ff6ba2 0%, #667eea 100%);">Save</button>
          </div>
        </form>
      </div>
    </div>

    <script>
        // Photo upload functionality
        function handlePhotoUpload(input) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    const patientPhoto = document.getElementById('patientPhoto');
                    patientPhoto.src = e.target.result;
                    
                    // Simulate PHP upload process
                    console.log('Photo uploaded successfully');
                    alert('Photo uploaded successfully!');
                    
                    // In a real PHP application, you would send this to server
                    // simulatePhotoUpload(e.target.result);
                };
                
                reader.readAsDataURL(input.files[0]);
            }
        }
        
        // Simulate PHP-like functionality for photo upload
        function simulatePhotoUpload(photoData) {
            // This would be handled by PHP in a real application
            const formData = {
                'patient_id': '12345',
                'photo_data': photoData,
                'upload_time': new Date().toISOString()
            };
            
            console.log('Simulated PHP upload:', formData);
            
            // In real PHP, you would:
            // 1. Validate the image
            // 2. Resize if necessary
            // 3. Save to server directory
            // 4. Update database record
            // 5. Return success/error response
        }
        
        // File download simulation
        document.querySelectorAll('.file-item').forEach(item => {
            item.addEventListener('click', function() {
                const fileName = this.querySelector('.file-name').textContent;
                alert(`Downloading ${fileName}...`);
                // In PHP, this would trigger actual file download
            });
        });
        
        // Print functionality
        document.querySelector('.btn-secondary').addEventListener('click', function() {
            if (this.textContent === 'PRINT') {
                window.print();
            }
        });

        document.getElementById('openScheduleModal').onclick = function() {
            document.getElementById('scheduleModal').style.display = 'flex';
        };
        document.getElementById('closeScheduleModal').onclick = function() {
            document.getElementById('scheduleModal').style.display = 'none';
        };
        document.getElementById('scheduleForm').onsubmit = function(e) {
            e.preventDefault();
            alert('Appointment scheduled!');
            document.getElementById('scheduleModal').style.display = 'none';
            // Here you would handle the form data (AJAX or form submission)
        };

        const doctorData = {
            gregorio: {
                name: 'Dr. Gregorio',
                speciality: 'Obstetrics & Gynecology',
                schedule: 'Mon, Wed, Fri - 9:00 AM to 12:00 PM',
                services: 'Prenatal Checkup, Ultrasound, Consultation'
            },
            santos: {
                name: 'Dr. Santos',
                speciality: 'Pediatrics',
                schedule: 'Tue, Thu - 10:00 AM to 2:00 PM',
                services: 'Child Checkup, Vaccination, Consultation'
            },
            delacruz: {
                name: 'Dr. Dela Cruz',
                speciality: 'General Medicine',
                schedule: 'Mon to Fri - 8:00 AM to 5:00 PM',
                services: 'General Consultation, Medical Certificate, Minor Surgery'
            }
        };

        document.querySelectorAll('.doctor-list-item').forEach(item => {
            item.onclick = function() {
                const doc = doctorData[this.dataset.doctor];
                document.getElementById('modalDoctorName').textContent = doc.name;
                document.getElementById('modalDoctorSpeciality').textContent = doc.speciality;
                document.getElementById('modalDoctorSchedule').textContent = doc.schedule;
                document.getElementById('modalDoctorServices').textContent = doc.services;
                document.getElementById('doctorModal').style.display = 'flex';
            };
        });
        document.getElementById('closeDoctorModal').onclick = function() {
            document.getElementById('doctorModal').style.display = 'none';
        };

        document.getElementById('openUpdateModal').onclick = function() {
            document.getElementById('updateModal').style.display = 'flex';
        };
        document.getElementById('closeUpdateModal').onclick = function() {
            document.getElementById('updateModal').style.display = 'none';
        };
        document.getElementById('updateForm').onsubmit = function(e) {
            e.preventDefault();
            alert('Patient information updated!');
            document.getElementById('updateModal').style.display = 'none';
            // Here you would handle the form data (AJAX or form submission)
        };

        // Show/hide Medical Record dashboard
        const medrecNav = document.getElementById('medrecNav');
        const medrecDashboard = document.getElementById('medrecDashboard');
        const mainContent = document.getElementById('mainContent');
        if (medrecNav && medrecDashboard && mainContent) {
          medrecNav.onclick = function() {
            medrecDashboard.style.display = 'block';
            mainContent.style.display = 'none';
            medrecNav.classList.add('active');
            document.getElementById('dashboardNav').classList.remove('active');
          };
          document.getElementById('dashboardNav').onclick = function() {
            medrecDashboard.style.display = 'none';
            mainContent.style.display = 'block';
            this.classList.add('active');
            medrecNav.classList.remove('active');
          };
        }

        // Analytics search form handler (placeholder)
        document.getElementById('analyticsSearchForm').onsubmit = function(e) {
          e.preventDefault();
          const date = document.getElementById('analyticsDate').value;
          alert('Search for date: ' + date + '\n(Backend integration needed)');
          // Here you would fetch and update the table rows based on the selected date
        };

        // Tab navigation logic
        const physicalExamTab = document.getElementById('physicalExamTab');
        const medicalHistoryTab = document.getElementById('medicalHistoryTab');
        const physicalExamContent = document.getElementById('physicalExamContent');
        const medicalHistoryContent = document.getElementById('medicalHistoryContent');
        physicalExamTab.onclick = function() {
          physicalExamTab.classList.add('active');
          physicalExamTab.style.color = '#7c3aed';
          physicalExamTab.style.fontWeight = '600';
          physicalExamTab.style.borderBottom = '2px solid #7c3aed';
          medicalHistoryTab.classList.remove('active');
          medicalHistoryTab.style.color = '#a0aec0';
          medicalHistoryTab.style.fontWeight = '500';
          medicalHistoryTab.style.borderBottom = '2px solid transparent';
          physicalExamContent.style.display = '';
          medicalHistoryContent.style.display = 'none';
        };
        medicalHistoryTab.onclick = function() {
          medicalHistoryTab.classList.add('active');
          medicalHistoryTab.style.color = '#7c3aed';
          medicalHistoryTab.style.fontWeight = '600';
          medicalHistoryTab.style.borderBottom = '2px solid #7c3aed';
          physicalExamTab.classList.remove('active');
          physicalExamTab.style.color = '#a0aec0';
          physicalExamTab.style.fontWeight = '500';
          physicalExamTab.style.borderBottom = '2px solid transparent';
          physicalExamContent.style.display = 'none';
          medicalHistoryContent.style.display = '';
        };

        // Date search handlers for Physical Exam and Medical History
        document.getElementById('physicalExamSearchForm').onsubmit = function(e) {
          e.preventDefault();
          const date = document.getElementById('physicalExamDate').value;
          alert('Physical Exam search for date: ' + date + '\n(Backend integration needed)');
        };
        document.getElementById('medicalHistorySearchForm').onsubmit = function(e) {
          e.preventDefault();
          const date = document.getElementById('medicalHistoryDate').value;
          alert('Medical History search for date: ' + date + '\n(Backend integration needed)');
        };

        // Billing navigation logic
        const billingNav = document.getElementById('billingNav');
        const billingDashboard = document.getElementById('billingDashboard');
        if (billingNav && billingDashboard && mainContent && medrecDashboard) {
          billingNav.onclick = function() { 
            billingDashboard.style.display = 'block';
            mainContent.style.display = 'none';
            medrecDashboard.style.display = 'none';
            billingNav.classList.add('active');
            document.getElementById('dashboardNav').classList.remove('active');
            document.getElementById('medrecNav').classList.remove('active');
          };
          // When dashboard or medrec is clicked, hide billing
          document.getElementById('dashboardNav').onclick = function() {
            billingDashboard.style.display = 'none';
            mainContent.style.display = 'block';
            medrecDashboard.style.display = 'none';
            this.classList.add('active');
            billingNav.classList.remove('active');
            document.getElementById('medrecNav').classList.remove('active');
          };
          document.getElementById('medrecNav').onclick = function() {
            billingDashboard.style.display = 'none';
            mainContent.style.display = 'none';
            medrecDashboard.style.display = 'block';
            this.classList.add('active');
            billingNav.classList.remove('active');
            document.getElementById('dashboardNav').classList.remove('active');
          };
        }

        // Update Patient Photo upload functionality
        document.getElementById('updatePhotoInput').addEventListener('change', function(e) {
          if (this.files && this.files[0]) {
            const reader = new FileReader();
            reader.onload = function(ev) {
              document.getElementById('updatePatientPhoto').src = ev.target.result;
            };
            reader.readAsDataURL(this.files[0]);
          }
        });

        // Doctor schedule data (same as Doctor Info modal)
        const scheduleDoctorData = {};
        document.getElementById('doctorSelect').addEventListener('change', function() {
          const selected = this.value;
          const infoDiv = document.getElementById('doctorScheduleInfo');
          if (scheduleDoctorData[selected]) {
            infoDiv.textContent = 'Schedule: ' + scheduleDoctorData[selected];
          } else {
            infoDiv.textContent = '';
          }
        });

        // Set current date in Medical Record section
        function formatDateMedrec(date) {
          const days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
          const d = date.getDate().toString().padStart(2, '0');
          const m = (date.getMonth() + 1).toString().padStart(2, '0');
          const y = date.getFullYear();
          return `${days[date.getDay()]}, ${d}.${m}.${y}`;
        }
        const medrecDateSpan = document.getElementById('medrecCurrentDate');
        if (medrecDateSpan) {
          medrecDateSpan.textContent = formatDateMedrec(new Date());
        }
    </script>

    <?php
    // PHP Backend Logic (commented as this is HTML artifact)
    /*
    // Database connection
    $pdo = new PDO('mysql:host=localhost;dbname=clinik', $username, $password);
    
    // Handle photo upload
    if ($_POST['action'] === 'upload_photo') {
        $patient_id = $_POST['patient_id'];
        $upload_dir = 'uploads/patients/';
        
        if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
            $file_extension = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
            $new_filename = $patient_id . '_' . time() . '.' . $file_extension;
            $upload_path = $upload_dir . $new_filename;
            
            // Validate image
            $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
            if (in_array(strtolower($file_extension), $allowed_types)) {
                if (move_uploaded_file($_FILES['photo']['tmp_name'], $upload_path)) {
                    // Update database
                    $stmt = $pdo->prepare("UPDATE patients SET photo_path = ? WHERE id = ?");
                    $stmt->execute([$upload_path, $patient_id]);
                    
                    echo json_encode(['status' => 'success', 'photo_url' => $upload_path]);
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'Upload failed']);
                }
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Invalid file type']);
            }
        }
    }
    
    // Get patient data
    function getPatientData($patient_id) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM patients WHERE id = ?");
        $stmt->execute([$patient_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    // Get patient files
    function getPatientFiles($patient_id) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM patient_files WHERE patient_id = ? ORDER BY upload_date DESC");
        $stmt->execute([$patient_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    // Get patient visits
    function getPatientVisits($patient_id) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM patient_visits WHERE patient_id = ? ORDER BY visit_date DESC");
        $stmt->execute([$patient_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    */
    ?>
</body>
</html>