<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background-color: #a020f0; color: white; padding: 20px; border-radius: 5px 5px 0 0; }
        .content { background-color: #f9f9f9; padding: 20px; border: 1px solid #ddd; border-radius: 0 0 5px 5px; }
        .field { margin-bottom: 15px; }
        .label { font-weight: bold; color: #555; }
        .value { margin-top: 5px; padding: 10px; background-color: white; border-radius: 4px; border: 1px solid #eee; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>New Project Review Submitted</h2>
        </div>
        <div class="content">
            <div class="field">
                <div class="label">Project:</div>
                <div class="value">{{ $data['project'] }}</div>
            </div>
            <div class="field">
                <div class="label">Reviewer Name:</div>
                <div class="value">{{ $data['name'] }}</div>
            </div>
            <div class="field">
                <div class="label">Company:</div>
                <div class="value">{{ $data['company'] ?? 'N/A' }}</div>
            </div>
            <div class="field">
                <div class="label">Review:</div>
                <div class="value">{{ $data['review'] }}</div>
            </div>
            <div class="field">
                <div class="label">Submitted at:</div>
                <div class="value">{{ now()->format('F j, Y g:i A') }}</div>
            </div>
        </div>
    </div>
</body>
</html>