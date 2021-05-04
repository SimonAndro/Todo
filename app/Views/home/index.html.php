<div class="home-view">
    <div class="tasks-container">
        <p id="recent-task"><a href="#"><i class="fas fa-th-list"></i>   Task due soon</a> </p>
        <div class="task-list" id="task-list">
            <p>No task due in the next five days</p>
        </div>
    </div>
    <!--Tasks container-->

    <div class="tasks-container">
        <p id="due-soon"><a href="#"><i class="fas fa-arrow-circle-down"></i>Recent projects</a> </p>
        <div class="project-list">
            <div class="new-pro">
                <a class="new-project" data-toggle="modal" data-target="#projectForm" href="#"><i
                        class="fas fa-plus"></i></a>
                <p>Create New</p>
            </div>
            <?php foreach($projects as $project):?>

                <div class="new-pro">
                    <a class="new-project" href="project?id=<?=$project->getProjectId()?>">
                        <i class="fas fa-project-diagram"></i>
                    </a>
                    <p><?=$project->getProjectName()?></p>
                </div>
        <p id="recent-project"><a href="#"><i class="fas fa-th-list"></i></i>   Recent projects</a> </p>
        <div class="project-list" id="project-list">
          <?php foreach($projects as $project):?>
            <div class="new-pro">
                <a class="new-project" data-toggle="modal" href="project&id=<?=$project->getProjectId()?>">
                    <i class="fas fa-project-diagram"></i>
                </a>
                <p><?=$project->getProjectName()?></p>
            </div>
            <?php endforeach ?>
            <div class="new-pro">
                <a class="new-project" data-toggle="modal" data-target="#projectForm" href="#"><i
                        class="fas fa-plus"></i></a>
                <p>Create new project</p>
            </div>
            
        </div>
    </div>
    <!--Tasks container-->
</div> <!-- home view -->

<!-- Modal for creating a project -->
<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="projectForm" tabindex="-1" aria-labelledby="projectFormLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="projectFormLabel">Create new project</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="project" method="POST" class="general-form">
                <div class="modal-body">
                    <label for="projectName">Project Name</label>
                    <input type="text" class="form-control" name="val[projectName]" value="" id="projectName"
                        placeholder="Eg. School">
                    <input type="hidden" name="val[ajax]" value="true" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Create Project</button>
                </div>
            </form>
        </div>
    </div>
</div> <!-- Modal -->

