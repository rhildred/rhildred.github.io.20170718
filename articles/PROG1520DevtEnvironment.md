Development Environment
=======================

Since we will be pushing our project live on to openshift, we will start with an openshift Tomcat 7 (JBoss EWS 2.0) gear. When downloaded the usual way, we just need to add a section to the pom.xml file:

	<build>
		<plugins>
			<plugin>
				<groupId>org.apache.maven.plugins</groupId>
				<artifactId>maven-site-plugin</artifactId>
				<version>3.0</version>
			</plugin>
			<plugin>
				<groupId>org.apache.tomcat.maven</groupId>
				<artifactId>tomcat7-maven-plugin</artifactId>
				<version>2.0</version>
			</plugin>
		</plugins>
	</build>

This section allows us to run on localhost as well as on openshift. To run:

1. Make a new maven runtime configuration.
1. use `tomcat7:run` as the goal and `${workspace_loc:/xxxxxxxxx}` as the base directory
1. use the run configuration to start tomcat, and put your jsp in the src/main/webapp folder