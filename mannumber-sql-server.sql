USE [mannumber]
GO

/****** Object:  Table [dbo].[users]    Script Date: 12/15/2017 3:51:01 PM ******/
DROP TABLE [dbo].[users]
GO

/****** Object:  Table [dbo].[users]    Script Date: 12/15/2017 3:51:01 PM ******/
SET ANSI_NULLS OFF
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[users](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[name] [nvarchar](255) NOT NULL,
	[firstname] [nvarchar](255) NOT NULL,
	[middlename] [nvarchar](255) NULL,
	[lastname] [nvarchar](255) NOT NULL,
	[email] [nvarchar](255) NOT NULL,
	[username] [nvarchar](255) NOT NULL,
	[employee_no] [nvarchar](255) NOT NULL,
	[sss_no] [nvarchar](255) NOT NULL,
	[password] [nvarchar](255) NOT NULL,
	[image] [nvarchar](255) NULL,
	[status] [nvarchar](255) NULL,
	[remember_token] [nvarchar](100) NULL,
	[created_by] [bigint] NULL,
	[updated_by] [bigint] NULL,
	[created_at] datetime2(0) NULL,
	[updated_at] datetime2(0) NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO


USE [mannumber]
GO

/****** Object:  Table [dbo].[user_roles]    Script Date: 12/15/2017 3:50:53 PM ******/
DROP TABLE [dbo].[user_roles]
GO

/****** Object:  Table [dbo].[user_roles]    Script Date: 12/15/2017 3:50:53 PM ******/
SET ANSI_NULLS OFF
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[user_roles](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[role_id] [nvarchar](255) NOT NULL,
	[user_id] [bigint] NOT NULL,
	[status] [nvarchar](255) NULL,
	[created_by] [bigint] NULL,
	[updated_by] [bigint] NULL,
	[created_at] datetime2(0) NULL,
	[updated_at] datetime2(0) NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO


USE [mannumber]
GO

/****** Object:  Table [dbo].[user_permissions]    Script Date: 12/15/2017 3:50:43 PM ******/
DROP TABLE [dbo].[user_permissions]
GO

/****** Object:  Table [dbo].[user_permissions]    Script Date: 12/15/2017 3:50:43 PM ******/
SET ANSI_NULLS OFF
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[user_permissions](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[permission_id] [nvarchar](255) NOT NULL,
	[user_id] [bigint] NOT NULL,
	[status] [nvarchar](255) NULL,
	[created_by] [bigint] NULL,
	[updated_by] [bigint] NULL,
	[created_at] datetime2(0) NULL,
	[updated_at] datetime2(0) NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO


USE [mannumber]
GO

/****** Object:  Table [dbo].[user_modules]    Script Date: 12/15/2017 3:50:26 PM ******/
DROP TABLE [dbo].[user_modules]
GO

/****** Object:  Table [dbo].[user_modules]    Script Date: 12/15/2017 3:50:26 PM ******/
SET ANSI_NULLS OFF
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[user_modules](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[module_id] [nvarchar](255) NOT NULL,
	[user_id] [bigint] NOT NULL,
	[status] [nvarchar](255) NULL,
	[created_by] [bigint] NULL,
	[updated_by] [bigint] NULL,
	[created_at] datetime2(0) NULL,
	[updated_at] datetime2(0) NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO

USE [mannumber]
GO

/****** Object:  Table [dbo].[roles]    Script Date: 12/15/2017 3:50:13 PM ******/
DROP TABLE [dbo].[roles]
GO

/****** Object:  Table [dbo].[roles]    Script Date: 12/15/2017 3:50:13 PM ******/
SET ANSI_NULLS OFF
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[roles](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[title] [nvarchar](255) NOT NULL,
	[prefix] [nvarchar](255) NOT NULL,
	[description] [nvarchar](max) NULL,
	[created_by] [bigint] NULL,
	[updated_by] [bigint] NULL,
	[created_at] datetime2(0) NULL,
	[updated_at] datetime2(0) NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]

GO


USE [mannumber]
GO

/****** Object:  Table [dbo].[requests]    Script Date: 12/15/2017 3:49:51 PM ******/
DROP TABLE [dbo].[requests]
GO

/****** Object:  Table [dbo].[requests]    Script Date: 12/15/2017 3:49:51 PM ******/
SET ANSI_NULLS OFF
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[requests](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[request_number] [int] NOT NULL,
	[company] [nvarchar](255) NOT NULL,
	[branch] [nvarchar](255) NOT NULL,
	[status] [nvarchar](255) NULL,
	[created_by] [bigint] NULL,
	[updated_by] [bigint] NULL,
	[created_at] datetime2(0) NULL,
	[updated_at] datetime2(0) NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO


USE [mannumber]
GO

/****** Object:  Table [dbo].[permissions]    Script Date: 12/15/2017 3:49:41 PM ******/
DROP TABLE [dbo].[permissions]
GO

/****** Object:  Table [dbo].[permissions]    Script Date: 12/15/2017 3:49:41 PM ******/
SET ANSI_NULLS OFF
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[permissions](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[title] [nvarchar](255) NOT NULL,
	[prefix] [nvarchar](255) NOT NULL,
	[description] [nvarchar](max) NULL,
	[status] [nvarchar](255) NULL,
	[created_by] [bigint] NULL,
	[updated_by] [bigint] NULL,
	[created_at] datetime2(0) NULL,
	[updated_at] datetime2(0) NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]

GO


USE [mannumber]
GO

/****** Object:  Table [dbo].[modules]    Script Date: 12/15/2017 3:49:22 PM ******/
DROP TABLE [dbo].[modules]
GO

/****** Object:  Table [dbo].[modules]    Script Date: 12/15/2017 3:49:22 PM ******/
SET ANSI_NULLS OFF
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[modules](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[title] [nvarchar](255) NOT NULL,
	[description] [nvarchar](max) NULL,
	[prefix] [nvarchar](255) NOT NULL,
	[icon] [nvarchar](255) NOT NULL,
	[sort_order] [int] NOT NULL,
	[status] [nvarchar](255) NULL,
	[created_by] [bigint] NULL,
	[updated_by] [bigint] NULL,
	[created_at] datetime2(0) NULL,
	[updated_at] datetime2(0) NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]

GO


USE [mannumber]
GO

/****** Object:  Table [dbo].[logs]    Script Date: 12/15/2017 3:48:44 PM ******/
DROP TABLE [dbo].[logs]
GO

/****** Object:  Table [dbo].[logs]    Script Date: 12/15/2017 3:48:44 PM ******/
SET ANSI_NULLS OFF
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[logs](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[user_id] [bigint] NOT NULL,
	[module] [nvarchar](255) NOT NULL,
	[table] [nvarchar](255) NOT NULL,
	[object_id] [bigint] NOT NULL,
	[method] [nvarchar](255) NOT NULL,
	[new_data] [nvarchar](max) NOT NULL,
	[old_data] [nvarchar](max) NULL,
	[ip_address] [nvarchar](255) NOT NULL,
	[user_agent] [nvarchar](255) NOT NULL,
	[created_at] datetime2(0) NULL,
	[updated_at] datetime2(0) NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]

GO


USE [mannumber]
GO

/****** Object:  Table [dbo].[employees]    Script Date: 12/15/2017 3:47:49 PM ******/
DROP TABLE [dbo].[employees]
GO

/****** Object:  Table [dbo].[employees]    Script Date: 12/15/2017 3:47:49 PM ******/
SET ANSI_NULLS OFF
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[employees](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[request_id] [bigint] NOT NULL,
	[employee_number] [bigint] NOT NULL,
	[full_name] [nvarchar](255) NULL,
	[first_name] [nvarchar](255) NULL,
	[middle_name] [nvarchar](255) NULL,
	[last_name] [nvarchar](255) NULL,
	[age] [int] NULL,
	[birth_date] [date] NULL,
	[address] [nvarchar](255) NULL,
	[zip_code] [nchar](255) NULL,
	[post_code] [nchar](255) NULL,
	[contact] [nchar](255) NULL,
	[gender] [nchar](255) NULL,
	[marital_status] [nchar](255) NULL,
	[religion] [nchar](255) NULL,
	[date_hire] [date] NULL,
	[sss_number] [bigint] NULL,
	[tin_number] [bigint] NULL,
	[phic_number] [bigint] NULL,
	[pagibig_number] [bigint] NULL,
	[hdmf_number] [bigint] NULL,
	[date_regularized] [date] NULL,
	[hourly_rate] [decimal](10, 2) NULL,
	[daily_rate] [decimal](10, 2) NULL,
	[branch] [nchar](255) NULL,
	[company] [nchar](255) NULL,
	[previous_branch] [nchar](255) NULL,
	[position] [nchar](255) NULL,
	[department] [nchar](255) NULL,
	[status] [nvarchar](255) NULL,
	[created_by] [bigint] NULL,
	[updated_by] [bigint] NULL,
	[created_at] datetime2(0) NULL,
	[updated_at] datetime2(0) NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO


