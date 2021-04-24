<div class="home-view">
    <div class="tasks-container">
        <p id="due-soon"><a href="#"><i class="fas fa-arrow-circle-down"></i>Task due soon</a> </p>
        <div class="task-list">
            <p>No recent tasks</p>
        </div>
    </div>
    <!--Tasks container-->

    <div class="tasks-container">
        <p id="due-soon"><a href="#"><i class="fas fa-arrow-circle-down"></i>Recent projects</a> </p>
        <div class="project-list">
            <div class="new-pro">
                <a class="new-project" data-toggle="modal" data-target="#projectForm" href="#"><i
                        class="fas fa-plus"></i></a>
                <p>Create new project</p>
                <!-- Modal -->
                <div class="modal fade" id="projectForm" tabindex="-1" aria-labelledby="projectFormLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="projectFormLabel">Create new project</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="POST">
                                    <label for="projectName">Project Name</label>
                                    <input type="text" class="form-control" name="projectName" id="projectName"
                                        placeholder="Eg. School">
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-success">Create Project</button>
                            </div>
                        </div>
                    </div>
                </div> <!-- Modal -->
            </div>
        </div>
    </div>
    <!--Tasks container-->
</div> <!-- home view -->

<!-- Modal for creating a project -->
<!-- Button trigger modal -->