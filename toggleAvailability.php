<?php
header('Content-Type: application/json');
include 'connect.php';

$input = json_decode(file_get_contents('php://input'), true);
$driverId = $input['driverId'] ?? null;

if (!$driverId) {
    echo json_encode(['success' => false, 'message' => 'Driver ID is missing.']);
    exit;
}

$stmt = $conn->prepare("SELECT availability FROM studentcardriver WHERE driverId = ?");
$stmt->bind_param("s", $driverId);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    $currentAvailability = $row['availability'];
    $newAvailability = ($currentAvailability === 'available') ? 'unavailable' : 'available';

    $updateStmt = $conn->prepare("UPDATE studentcardriver SET availability = ? WHERE driverId = ?");
    $updateStmt->bind_param("ss", $newAvailability, $driverId);

    if ($updateStmt->execute()) {
        echo json_encode(['success' => true, 'newAvailability' => $newAvailability]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to update availability.']);
    }

    $updateStmt->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Driver not found.']);
}

$stmt->close();
$conn->close();
?>
