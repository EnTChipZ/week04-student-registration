# Laravel Request Lifecycle Diagram

This diagram maps how an incoming HTTP request traverses Laravel's pipeline.

```mermaid
graph TD
    A[Browser / Client Request] -->|Sends POST /students| B(routes/web.php)
    B -->|Routes Request| C[StudentController@store]
    C -->|Executes Validation Rules| D{Valid Request Data?}
    D -->|No: Redirects Back with Errors| E[Browser / Old Inputs]
    D -->|Yes| F[Storage: Upload Profile Picture]
    F -->|Stores Image path| G[Eloquent Model: Student]
    G -->|Inserts Record| H[(MySQL Database)]
    H -->|Saves & Returns Model| I[Redirect to show.blade.php]
    I -->|Flashes Success Notification| J[Render Student Profile View]
```
