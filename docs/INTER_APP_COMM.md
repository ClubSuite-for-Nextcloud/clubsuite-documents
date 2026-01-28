Inter-App Communication (Dokumente)

Kurzdoku: Events und Callbacks für lose Kopplung.

Beispiele
```
$eventService->dispatchBasicEvent(['templateId'=>12]);
```

Listener:
```
public function handle(CallbackEvent $e) { $e->triggerCallback(['ok'=>true]); }
```
